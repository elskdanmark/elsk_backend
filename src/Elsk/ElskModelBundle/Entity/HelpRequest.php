<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * HelpRequest
 */
class HelpRequest
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
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return HelpRequest
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return HelpRequest
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return HelpRequest
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
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

