<?php

namespace Elsk\ElskModelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Util\Debug;

/**
 * HelpRequest
 */
class HelpRequest extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $helpCategory;

    /**
     * @var string
     */
    private $daysAvailable;

    /**
     * @var \DateTime
     */
    private $requestDate;

	/**
	 * @var boolean
	 */
	private $hasTools;

	/**
	 * @var string
	 */
	private $toolsNeeded;

	/**
	 * @var string
	 */
	private $specialCare;

    /**
     * @var \Elsk\ElskModelBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $helpType;

    /**
     * Constructor
     */
    public function __construct()
    {
	    parent::__construct();
        $this->helpType = new ArrayCollection();
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
     * Set helpCategory
     *
     * @param string $helpCategory
     *
     * @return HelpRequest
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
     * Set daysAvailable
     *
     * @param string $daysAvailable
     *
     * @return HelpRequest
     */
    public function setDaysAvailable($daysAvailable)
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
     * @return HelpRequest
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
     * @param \Elsk\ElskModelBundle\Entity\User $user
     *
     * @return HelpRequest
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Elsk\ElskModelBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add helpType
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpType $helpType
     *
     * @return HelpRequest
     */
    public function addHelpType(HelpType $helpType)
    {
        $this->helpType[] = $helpType;

        return $this;
    }

    /**
     * Remove helpType
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpType $helpType
     */
    public function removeHelpType(HelpType $helpType)
    {
        $this->helpType->removeElement($helpType);
    }

    /**
     * Get helpType
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHelpType()
    {
        return $this->helpType;
    }

    /**
     * Set hasTools
     *
     * @param boolean $hasTools
     *
     * @return HelpRequest
     */
    public function setHasTools($hasTools)
    {
        $this->hasTools = $hasTools;

        return $this;
    }

    /**
     * Get hasTools
     *
     * @return boolean
     */
    public function getHasTools()
    {
        return $this->hasTools;
    }

    /**
     * Set toolsNeeded
     *
     * @param string $toolsNeeded
     *
     * @return HelpRequest
     */
    public function setToolsNeeded($toolsNeeded)
    {
        $this->toolsNeeded = $toolsNeeded;

        return $this;
    }

    /**
     * Get toolsNeeded
     *
     * @return string
     */
    public function getToolsNeeded()
    {
        return $this->toolsNeeded;
    }

    /**
     * Set specialCare
     *
     * @param string $specialCare
     *
     * @return HelpRequest
     */
    public function setSpecialCare($specialCare)
    {
        $this->specialCare = $specialCare;

        return $this;
    }

    /**
     * Get specialCare
     *
     * @return string
     */
    public function getSpecialCare()
    {
        return $this->specialCare;
    }

	/**
	 * Check if it requires a special ability
	 *
	 * @return bool
	 */
	public function requireSpecialAbility(){
		$specialHelpType = $this->helpType->filter(function ($helpType) {
			return ($helpType->getRequiredSpecialAbility());
		});
		return !($specialHelpType->isEmpty() && $this->hasTools) ;
	}
}
