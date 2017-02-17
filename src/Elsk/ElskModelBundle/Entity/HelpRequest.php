<?php

namespace Elsk\ElskModelBundle\Entity;

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
        $this->helpType = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function setUser(\Elsk\ElskModelBundle\Entity\User $user = null)
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
    public function addHelpType(\Elsk\ElskModelBundle\Entity\HelpType $helpType)
    {
        $this->helpType[] = $helpType;

        return $this;
    }

    /**
     * Remove helpType
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpType $helpType
     */
    public function removeHelpType(\Elsk\ElskModelBundle\Entity\HelpType $helpType)
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
}

