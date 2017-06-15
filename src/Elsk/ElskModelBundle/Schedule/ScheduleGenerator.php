<?php

namespace Elsk\ElskModelBundle\Schedule;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Elsk\CoreBundle\Controller\ScheduleController;
use Elsk\ElskModelBundle\Entity\HelpEvent;
use Symfony\Component\VarDumper\VarDumper;
use Doctrine\Common\Util\Debug;

/**
 * Class Schedule
 *
 * @package Elsk\ElskModelBundle\Schedule
 */
class ScheduleGenerator {

	/**
	 * @var HelpEvent
	 */
	private $helpEvent;

	/**
	 * @var
	 */
	private $helpRequests;

	/**
	 * @var
	 */
	private $helpOffers;

	/**
	 * @var array
	 */
	private $matrix = [
/*		[2, 3, 3],
		[3, 2, 3],
		[0, 3, 2]*/
	];

	private $teamMaxSize = 3;

	/**
	 *
	 */
	const HIGH_COST = 999999;

	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	/**
	 * @var ProcessUserRequest
	 */
	private $procUserReq;

	/**
	 * @var array
	 */
	private $volunteerMap = [];

	/**
	 * @var array
	 */
	private $recipientMap = [];

	/**
	 * @param HelpEvent $helpEvent
	 * @param ProcessUserRequest $processUserRequest
	 * @param EntityManagerInterface $entityManager
	 */
	public function __construct(HelpEvent $helpEvent, ProcessUserRequest $processUserRequest, EntityManagerInterface $entityManager){
		$this->helpEvent =  $helpEvent;
		$this->entityManager = $entityManager;
		$this->procUserReq = $processUserRequest;
	}

	/**
	 * Get all current requests by request type. i.e all the request made between the start date of the previous event
	 * and the start date of the current event $this->HelpEvent
	 *
	 * @param string $reqType, the class name of the request type. either : HelpRequest or HelpOffer
	 * @return array, list of Request of the type specified by $reqType
	 */
	private function getAllCurRequests($reqType){
		$entity = 'ElskModelBundle:'.$reqType;
		$previousEvent = $this->getPreviousEvent();
		$beginDate = $previousEvent? $previousEvent->getEndDate()->format(ScheduleController::MYSQL_DATE_FORMAT) : '0';
		$qb = $this->entityManager->createQueryBuilder();
		$query = $qb->select('r')
			->from($entity, 'r')
			->where($qb->expr()->between('r.requestDate', '?1', '?2'))
			->setParameters([1 => $beginDate, 2 => $this->helpEvent->getStartDate()])
			->getQuery();

		return $query->getResult();
	}

	/**
	 * Get the previous Event
	 *
	 * @return mixed
	 * @throws NonUniqueResultException
	 */
	private function getPreviousEvent(){
		$qb = $this->entityManager->createQueryBuilder();
		$query = $qb->select('e')
			->from('ElskModelBundle:HelpEvent', 'e')
			->where($qb->expr()->lt('e.startDate', '?1'))
			->orderBy('e.startDate', 'DESC')
			->setParameter(1, $this->helpEvent->getStartDate())
			->setMaxResults(1)
			->getQuery();

		return $query->getOneOrNullResult();
	}

	/**
	 * Get all help requests specific to $this->HelpEvent. ie made between start date of previous HelpEvent and the
	 * startDate of the current HelpEvent
	 *
	 * @return array, list of HelpRequest
	 */
	public function getAllEventHelpRequest(){
		return $this->getAllCurRequests('HelpRequest');;
	}

	/**
	 * @param $recipientCat
	 * @param $volunteerCat
	 * @return int
	 */
	public function getCost($recipientCat, $volunteerCat){
		$catPriority = [
			ProcessUserRequest::HELP_CAT_GREEN => 0,
			ProcessUserRequest::HELP_CAT_YELLOW => 1,
			ProcessUserRequest::HELP_CAT_RED => 2
		];

		if($recipientCat === $volunteerCat) {
			return 1;
		}

		if($catPriority[$recipientCat] === $catPriority[$volunteerCat] - 1){
			return 2;
		}

		if($catPriority[$recipientCat] === $catPriority[$volunteerCat] - 2){
			return 3;
		}

		return self::HIGH_COST;
	}

	/**
	 * Initialise the cost matrix to supplier to hungarian algorithm
	 *
	 * @return array
	 */
	public function createCostMatrix(){
		$helpOffers = $this->entityManager
			->getRepository('ElskModelBundle:HelpOffer')
			->findAll();

		$curHelpReqs = $this->getAllEventHelpRequest();
		$i = 0;
		foreach($helpOffers as $helpOffer){
			if(empty($helpOffer->getHelpCategory())) {
				$this->procUserReq->assignHelpOfferCat($helpOffer);
			}
			$j = 0;
			$this->volunteerMap[$i] = $helpOffer->getUser()->getId();
			foreach($curHelpReqs as $helpReq){
				if(empty($helpReq->getHelpCategory())) {
					$this->procUserReq->assignHelpReqCat($helpReq);
				}

				$commonAvailability = array_intersect($helpReq->getDaysAvailable(), $helpOffer->getDaysAvailable());
				$helpMatch = $this->procUserReq->matchHelps($helpOffer, $helpReq);
				for($k = 0; $k < $this->teamMaxSize; $k++){
					if(!isset($this->recipientMap[$j])){
						$this->recipientMap[$j] = $helpReq->getUser()->getId();
					}
					if(!empty($commonAvailability) && $helpMatch){
						$this->matrix[$i][$j++] = $this->getCost($helpReq->getHelpCategory(), $helpOffer->getHelpCategory());
					} else {
						$this->matrix[$i][$j++] = self::HIGH_COST;
					}
				}
			}
			$i++;
		}

		return $this->matrix;
	}

	/**
	 * Implements of the hungarian method for the assignment problem
	 *
	 * @param array $matrix
	 * @return array
	 */
	private function execCustomHungarian($matrix = [])
	{
		if(empty($matrix)){
			$matrix = $this->matrix;
		}
		$h = count($matrix);
		$w = count($matrix[0]);
		// If the input matrix isn't square, make it square
		// and fill the empty values with the INF, here HIGH_COST = 9999999
		if ($h < $w) {
			for ($i = $h; $i < $w; ++$i) {
				$matrix[$i] = array_fill(0, $w, self::HIGH_COST);
			}
		} elseif ($w < $h) {
			foreach ($matrix as &$row) {
				for ($i = $w; $i < $h; ++$i) {
					$row[$i] = self::HIGH_COST;
				}
			}
		}
		$h = $w = max($h, $w);
		$u   = array_fill(0, $h, 0);
		$v   = array_fill(0, $w, 0);
		$ind = array_fill(0, $w, -1);
		foreach (range(0, $h - 1) as $i) {
			$links   = array_fill(0, $w, -1);
			$mins    = array_fill(0, $w, self::HIGH_COST);
			$visited = array_fill(0, $w, false);
			$markedI = $i;
			$markedJ = -1;
			$j       = 0;
			while (true) {
				$j = -1;
				foreach (range(0, $h - 1) as $j1) {
					if (!$visited[$j1]) {
						$cur = $matrix[$markedI][$j1] - $u[$markedI] - $v[$j1];
						if ($cur < $mins[$j1]) {
							$mins[$j1]  = $cur;
							$links[$j1] = $markedJ;
						}
						if ($j == -1 || $mins[$j1] < $mins[$j]) {
							$j = $j1;
						}
					}
				}
				$delta = $mins[$j];
				foreach (range(0, $w - 1) as $j1) {
					if ($visited[$j1]) {
						$u[$ind[$j1]] += $delta;
						$v[$j1] -= $delta;
					} else {
						$mins[$j1] -= $delta;
					}
				}
				$u[$i] += $delta;
				$visited[$j] = true;
				$markedJ = $j;
				$markedI = $ind[$j];
				if ($markedI == -1) {
					break;
				}
			}

			while (true) {
				if ($links[$j] != -1) {
					$ind[$j] = $ind[$links[$j]];
					$j       = $links[$j];
				} else {
					break;
				}
			}
			$ind[$j] = $i;
		}
		$result = array();
		foreach (range(0, $w - 1) as $j) {
			$result[$j] = $ind[$j];
		}
		return $result;
	}


	/**
	 * Compute and return the planning as an array where the columns correspond to help request
	 * and rows to help offer requests
	 *
	 * @return array
	 */
	public function getPlanning(){
		$this->createCostMatrix();
		$data = $this->execCustomHungarian();
		$result = [];
		$userRepo = $this->entityManager->getRepository('ElskModelBundle:User');
		foreach($this->volunteerMap as $i => $offerId){
			$user = $userRepo->find($offerId);
			if(isset($this->recipientMap[$data[$i]])){
				$result[$user->getFirstName()] = $userRepo->find($this->recipientMap[$data[$i]])->getFirstName();
			} else {
				$result[$user->getFirstName()] = 'NA';
			}
		}

		return $result;
	}
}
