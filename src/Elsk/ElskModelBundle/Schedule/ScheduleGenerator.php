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

	private $helpRequests;

	private $helpOffers;

	private $matrix = [
/*		[2, 3, 3],
		[3, 2, 3],
		[0, 3, 2]*/
	];

	const HIGH_COST = 999999;
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;
	/**
	 * @var ProcessUserRequest
	 */
	private $processUserRequest;

	/**
	 * @param HelpEvent $helpEvent
	 * @param ProcessUserRequest $processUserRequest
	 * @param EntityManagerInterface $entityManager
	 */
	public function __construct(HelpEvent $helpEvent, ProcessUserRequest $processUserRequest, EntityManagerInterface $entityManager){
		$this->helpEvent =  $helpEvent;
		$this->entityManager = $entityManager;
		$this->processUserRequest = $processUserRequest;
	}

	/**
	 *
	 */
	private function getAllEventRequest($entityName){
		$entity = 'ElskModelBundle:'.$entityName;
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

	public function getAllEventHelpRequest(){
		return $this->getAllEventRequest('HelpRequest');;
	}

	public function createCostMatrix(){
		$helpOffers = $this->entityManager
			->getRepository('ElskModelBundle:HelpOffer')
			->findAll();
		$currentHelpRequests = $this->getAllEventHelpRequest();
		VarDumper::dump($helpOffers);
		VarDumper::dump($currentHelpRequests);
		$i = 0;
		foreach($helpOffers as $helpOffer){
			if(empty($helpOffer->getHelpCategory())) $helpOffer->assignCategory();
			$j = 0;
			foreach($currentHelpRequests as $helpRequest){
				$commonAvailability = array_intersect($helpRequest->getDaysAvailable(), $helpOffer->getDaysAvailable());

				$helpMatch = $this->processUserRequest->matchHelps($helpOffer, $helpRequest);

				if(!empty($commonAvailability) && $helpMatch){
					if($helpRequest->getHelpCategory() === $helpOffer->getHelpCategory()) {
						$this->matrix[$i][$j++] = 1;
					}
				} else {
					$this->matrix[$i][$j++] = self::HIGH_COST;
				}
			}

			$i++;
		}

		return $this->matrix;
	}

	public function custom_hungarian($matrix = [])
	{
		if(empty($matrix)){
			$matrix = $this->matrix;
		}
		$h = count($matrix);
		$w = count($matrix[0]);
		// If the input matrix isn't square, make it square
		// and fill the empty values with the INF, here 9999999
		if ($h < $w) {
			for ($i = $h; $i < $w; ++$i) {
				$matrix[$i] = array_fill(0, $w, 999999);
			}
		} elseif ($w < $h) {
			foreach ($matrix as &$row) {
				for ($i = $w; $i < $h; ++$i) {
					$row[$i] = 999999;
				}
			}
		}
		$h = $w = max($h, $w);
		$u   = array_fill(0, $h, 0);
		$v   = array_fill(0, $w, 0);
		$ind = array_fill(0, $w, -1);
		foreach (range(0, $h - 1) as $i) {
			$links   = array_fill(0, $w, -1);
			$mins    = array_fill(0, $w, 999999);
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
} 