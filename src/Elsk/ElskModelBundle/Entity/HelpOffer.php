<?php

namespace Elsk\ElskModelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

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
	private $specialAbility;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->specialAbility = new ArrayCollection();
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
	 * @param string $daysAvailable
	 *
	 * @return HelpOffer
	 */
	public function setDaysAvalaible($daysAvailable)
	{
		$this->daysAvailable = $daysAvailable;

		return $this;
	}

	/**
	 * Get daysAvailable
	 *
	 * @return string
	 */
	public function getDaysAvailable()
	{
		return $this->daysAvailable;
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
	 * Add specialAbility
	 *
	 * @param SpecialAbility $specialAbility
	 *
	 * @return HelpOffer
	 */
	public function addSpecialAbility(SpecialAbility $specialAbility)
	{
		$this->specialAbility[] = $specialAbility;

		return $this;
	}

	/**
	 * Remove specialAbility
	 *
	 * @param SpecialAbility $specialAbility
	 */
	public function removeSpecialAbility(SpecialAbility $specialAbility)
	{
		$this->specialAbility->removeElement($specialAbility);
	}

	/**
	 * Get specialAbility
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getSpecialAbility()
	{
		return $this->specialAbility;
	}

	public function canBeYellowCategory(){
		$specialHelpOffer = $this->specialAbility->filter(function ($ability) {
			return ($ability->getIsSpecialAbility());
		});
		return !($specialHelpOffer->isEmpty()) ;
	}
}
