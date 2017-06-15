<?php

namespace Elsk\ElskModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Elsk\ElskModelBundle\Schedule\ProcessUserRequest;

/**
 * HelpOffer
 */
class HelpOffer extends Timestampable
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $transport;

	/**
	 * @var string
	 */
	private $helpCategory;

	/**
	 * @var string
	 */
	private $comment;

	/**
	 * @var string
	 */
	private $daysAvailable;

	/**
	 * @var date
	 */
	private $requestDate;

	/**
	 * @var User
	 */
	private $user;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 */
	private $ability;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->ability = new ArrayCollection();
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set transport
	 *
	 * @param string $transport
	 *
	 * @return HelpOffer
	 */
	public function setTransport($transport)
	{
		$this->transport = $transport;

		return $this;
	}

	/**
	 * Get transport
	 *
	 * @return string
	 */
	public function getTransport()
	{
		return $this->transport;
	}

	/**
	 * Set helpCategory
	 *
	 * @param string $helpCategory
	 *
	 * @return HelpOffer
	 */
	public function setHelpCategory($helpCategory)
	{
		$this->helpCategory = $helpCategory;

		return $this;
	}

	/**
	 * Get helpCategory
	 *
	 * @return string
	 */
	public function getHelpCategory()
	{
		return $this->helpCategory;
	}

	/**
	 * Set comment
	 *
	 * @param string $comment
	 *
	 * @return HelpOffer
	 */
	public function setComment($comment)
	{
		$this->comment = $comment;

		return $this;
	}

	/**
	 * Get comment
	 *
	 * @return string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * Set daysAvalaible
	 *
	 * @param array $daysAvailable, an array of days of availability
	 * each of 3 characters. e.g [Mon, Wed, Fri, Son]
	 *
	 * @return HelpOffer
	 */
	public function setDaysAvailable($daysAvailable)
	{
		$daysAvailable = array_map(function($day){
			if(strlen($day) !== 3){
				throw new Exception('Invalid Days available Format');
			}
			return ucfirst($day);
		}, $daysAvailable);

		$this->daysAvailable = implode(',', $daysAvailable);

		return $this;
	}

	/**
	 * Get daysAvailable
	 *
	 * @return array
	 */
	public function getDaysAvailable()
	{
		return explode(',', $this->daysAvailable);
	}

	/**
	 * Set requestDate
	 *
	 * @param \DateTime $requestDate
	 *
	 * @return HelpOffer
	 */
	public function setRequestDate($requestDate)
	{
		$this->requestDate = $requestDate;

		return $this;
	}

	/**
	 * Get requestDate
	 *
	 * @return \DateTime
	 */
	public function getRequestDate()
	{
		return $this->requestDate;
	}

	/**
	 * Set user
	 *
	 * @param User $user
	 *
	 * @return HelpOffer
	 */
	public function setUser(User $user = null)
	{
		$this->user = $user;

		return $this;
	}

	/**
	 * Get user
	 *
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * Add ability
	 *
	 * @param Ability $ability
	 *
	 * @return HelpOffer
	 */
	public function addAbility(Ability $ability)
	{
		$this->ability[] = $ability;

		return $this;
	}

	/**
	 * Remove ability
	 *
	 * @param Ability $ability
	 */
	public function removeAbility(Ability $ability)
	{
		$this->ability->removeElement($ability);
	}

	/**
	 * Get ability
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getAbility()
	{
		return $this->ability;
	}

	/**
	 * @return bool
	 */
	public function canBeYellowCategory(){
		$specialHelpOffer = $this->ability->filter(function (Ability $ability) {
			return ($ability->isSpecialAbility());
		});
		return !($specialHelpOffer->isEmpty()) ;
	}

	public function assignCategory(){
		$this->canBeYellowCategory()?
			$this->setHelpCategory(ProcessUserRequest::HELP_CAT_YELLOW)
		:
			$this->setHelpCategory(ProcessUserRequest::HELP_CAT_GREEN);

	}
}
