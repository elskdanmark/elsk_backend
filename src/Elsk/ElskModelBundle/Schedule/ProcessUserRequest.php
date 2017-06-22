<?php

namespace Elsk\ElskModelBundle\Schedule;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManagerInterface;
use Elsk\ElskModelBundle\Entity\Ability;
use Elsk\ElskModelBundle\Entity\HelpOffer;
use Elsk\ElskModelBundle\Entity\HelpRequest;
use Elsk\ElskModelBundle\Entity\HelpType;
use Elsk\ElskModelBundle\Entity\User;
use Doctrine\Common\Util\Debug;

/**
 * Class ProcessUserRequest
 *
 * @package Elsk\ElskModelBundle\Schedule
 */
class ProcessUserRequest {

	/**
	 * @const string for help category of type Green
	 */
	const HELP_CAT_GREEN = 'G';

	/**
	 *@const string for help category of type Yellow
	 */
	const HELP_CAT_YELLOW = 'Y';

	/**
	 *@const string for help category of type Red
	 */
	const HELP_CAT_RED = 'R';

	/**
	 * @var array.
	 * @todo quick fix to solve the issue of matching the help request to someone that really do
	 * need to column in the help to tag the offer that can matches it. otherwise this is irrelevant to matching algo
	 * and therefore need to deleted
	 */
	private  $HELP_MATCH = [
		'artisanal' => [
			'Cleaning inside',
			'Cleanup in',
			'Cleanup outside',
			'Window cleaning',
			'Gardening',
			'Laundry',
			'Grocery shopping',
			'kitchen Help',
			'Small repairs and other practical tasks'
		],
		'moving' => [
			'Moving',
		],
		'painting' => [
			'painting',
		],
		'computer' => [
			'computer Help',
		]
	];

	/**
	 * @var ObjectManager
	 */
	private $entityManager;

	/**
	 * @param  EntityManagerInterface $entityManager
	 */
	public function __construct(EntityManagerInterface $entityManager){
		$this->entityManager =  $entityManager;
	}

	/**
	 * Assign a category to a user
	 *
	 * @param $userId, the user id
	 *
	 */
	public function assignCategory($userId){

		$userRepository = $this->entityManager->getRepository('ElskModelBundle:User');
		$user = $userRepository->find($userId);

		if($user && $user instanceof User){
			switch($user->getType()){
				case 'RECIPIENT' :
					$userHelpRequest = $this->getLastUserResquest($user);
					if($userHelpRequest instanceof HelpRequest){
						if($userHelpRequest->getHelpCategory()) {
							return;
						}
						if($userHelpRequest->requireSpecialAbility()){
							$userHelpRequest->setHelpCategory(self::HELP_CAT_YELLOW);
						} else {
							$userHelpRequest->setHelpCategory(self::HELP_CAT_GREEN);
						}
					} //todo throw exception for not request for this user
					$this->entityManager->persist($userHelpRequest);
					$this->entityManager->flush($userHelpRequest);

					break;
				case 'VOLUNTEER' :
					$userHelpOffer = $this->getLastUserResquest($user);
					if($userHelpOffer->getHelpCategory()) {
						return;
					}
					if($userHelpOffer->canBeYellowCategory()){
						$userHelpOffer->setHelpCategory(self::HELP_CAT_YELLOW);
					} else {
						$userHelpOffer->setHelpCategory(self::HELP_CAT_GREEN);
					}
					break;
			}
		} //todo throw exception for user not found
	}

	public function assignHelpReqCat(HelpRequest $helpRequest){
		if($helpRequest){
			if($helpRequest->requireSpecialAbility()){
				$helpRequest->setHelpCategory(self::HELP_CAT_YELLOW);
			} else {
				$helpRequest->setHelpCategory(self::HELP_CAT_GREEN);
			}
			$this->entityManager->persist($helpRequest);
			$this->entityManager->flush();
		}
	}

	public function assignHelpOfferCat(HelpOffer $helpOffer){
		if($helpOffer){
			if($helpOffer->canBeYellowCategory()){
				$helpOffer->setHelpCategory(self::HELP_CAT_YELLOW);
			} else {
				$helpOffer->setHelpCategory(self::HELP_CAT_GREEN);
			}
			$this->entityManager->persist($helpOffer);
			$this->entityManager->flush();
		}
	}

	/**
	 * Get the end date of the last help event organised
	 *
	 * @param string $elskCityId
	 * @return mixed
	 */
	private function getLastEventEndDate($elskCityId){
		$queryBuilder = $this->entityManager->createQueryBuilder();
		$query = $queryBuilder->select(['e']) // string 'u' is converted to array internally
	        ->from('ElskModelBundle:HelpEvent', 'e')
			->where('IDENTITY(e.elskCity) = ?1')
			->andWhere($queryBuilder->expr()->gte('e.startDate', '?2'))
	        ->orderBy('e.endDate', 'DESC')
			->setParameters([1 => $elskCityId, 2 => date('Y-m-d')])
			->setMaxResults(1)
			->getQuery();

		return $query->getOneOrNullResult();
	}

	/**
	 * @param User $user
	 * @return array
	 */
	private function getLastUserResquest(User $user){
		$requestTable = '';
		if($user->getType() === User::USER_TYPE[2]){
			$requestTable = 'ElskModelBundle:HelpRequest';
		}

		if($user->getType() === User::USER_TYPE[3]){
			$requestTable = 'ElskModelBundle:HelpOffer';
		}

		$ed = $this->getLastEventEndDate($user->getElskCity())
			->getEndDate()
			->format('Y-m-d');

		$q = $this->entityManager
			->createQuery("SELECT r FROM {$requestTable} r JOIN r.user a WHERE (a.id = {$user->getId()} AND r.requestDate <= '{$ed}')");

		$r = $q->getSingleResult(); // $query->getOneOrNullResult();
		if($r){
			return $r;
		} else{return NULL;}
	}

	public function matchHelps(HelpOffer $helpOffer, HelpRequest $helpRequest){
		$offerNames = $helpOffer->getAbility()
			->map(
				function(Ability $ability){
					return $ability->getAbilityName();
				})
			->toArray();

		$helpRequeted = $helpRequest->getHelpType()
			->map(
				function(HelpType $helpType){
					return $helpType->getHelpName();
				})
			->toArray();

		foreach($helpRequeted as $request){
			if(($request != $this->HELP_MATCH['moving']) && ($request != $this->HELP_MATCH['computer']) && ($request != $this->HELP_MATCH['painting'])) {
				return true;
			} else{
				if(in_array($request, $offerNames)){
					return true;
				}
			}
		}

		return false;
	}
}
