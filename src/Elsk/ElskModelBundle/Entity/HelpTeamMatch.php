<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * HelpTeamMatch
 */
class HelpTeamMatch
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $helpOfferId;

    /**
     * @var \DateTime
     */
    private $visitDate;

    /**
     * @var integer
     */
    private $helpEventId;

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
     * @var \Elsk\ElskModelBundle\Entity\Schedule
     */
    private $schedule;

    /**
     * @var \Elsk\ElskModelBundle\Entity\HelpRequest
     */
    private $helpRequest;


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
     * Set helpOfferId
     *
     * @param integer $helpOfferId
     *
     * @return HelpTeamMatch
     */
    public function setHelpOfferId($helpOfferId)
    {
        $this->helpOfferId = $helpOfferId;

        return $this;
    }

    /**
     * Get helpOfferId
     *
     * @return integer
     */
    public function getHelpOfferId()
    {
        return $this->helpOfferId;
    }

    /**
     * Set visitDate
     *
     * @param \DateTime $visitDate
     *
     * @return HelpTeamMatch
     */
    public function setVisitDate($visitDate)
    {
        $this->visitDate = $visitDate;

        return $this;
    }

    /**
     * Get visitDate
     *
     * @return \DateTime
     */
    public function getVisitDate()
    {
        return $this->visitDate;
    }

    /**
     * Set helpEventId
     *
     * @param integer $helpEventId
     *
     * @return HelpTeamMatch
     */
    public function setHelpEventId($helpEventId)
    {
        $this->helpEventId = $helpEventId;

        return $this;
    }

    /**
     * Get helpEventId
     *
     * @return integer
     */
    public function getHelpEventId()
    {
        return $this->helpEventId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return HelpTeamMatch
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
     * @return HelpTeamMatch
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
     * @return HelpTeamMatch
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
     * Set schedule
     *
     * @param \Elsk\ElskModelBundle\Entity\Schedule $schedule
     *
     * @return HelpTeamMatch
     */
    public function setSchedule(\Elsk\ElskModelBundle\Entity\Schedule $schedule = null)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \Elsk\ElskModelBundle\Entity\Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set helpRequest
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpRequest $helpRequest
     *
     * @return HelpTeamMatch
     */
    public function setHelpRequest(\Elsk\ElskModelBundle\Entity\HelpRequest $helpRequest = null)
    {
        $this->helpRequest = $helpRequest;

        return $this;
    }

    /**
     * Get helpRequest
     *
     * @return \Elsk\ElskModelBundle\Entity\HelpRequest
     */
    public function getHelpRequest()
    {
        return $this->helpRequest;
    }
}

