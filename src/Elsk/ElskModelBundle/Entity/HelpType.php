<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * HelpType
 */
class HelpType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $helpName;

    /**
     * @var string
     */
    private $requiredSpecialAbility;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $helpRequest;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->helpRequest = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set helpName
     *
     * @param string $helpName
     *
     * @return HelpType
     */
    public function setHelpName($helpName)
    {
        $this->helpName = $helpName;

        return $this;
    }

    /**
     * Get helpName
     *
     * @return string
     */
    public function getHelpName()
    {
        return $this->helpName;
    }

    /**
     * Set requiredSpecialAbility
     *
     * @param string $requiredSpecialAbility
     *
     * @return HelpType
     */
    public function setRequiredSpecialAbility($requiredSpecialAbility)
    {
        $this->requiredSpecialAbility = $requiredSpecialAbility;

        return $this;
    }

    /**
     * Get requiredSpecialAbility
     *
     * @return string
     */
    public function getRequiredSpecialAbility()
    {
        return $this->requiredSpecialAbility;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return HelpType
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
     * @return HelpType
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
     * @return HelpType
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
     * Add helpRequest
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpRequest $helpRequest
     *
     * @return HelpType
     */
    public function addHelpRequest(\Elsk\ElskModelBundle\Entity\HelpRequest $helpRequest)
    {
        $this->helpRequest[] = $helpRequest;

        return $this;
    }

    /**
     * Remove helpRequest
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpRequest $helpRequest
     */
    public function removeHelpRequest(\Elsk\ElskModelBundle\Entity\HelpRequest $helpRequest)
    {
        $this->helpRequest->removeElement($helpRequest);
    }

    /**
     * Get helpRequest
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHelpRequest()
    {
        return $this->helpRequest;
    }
}

