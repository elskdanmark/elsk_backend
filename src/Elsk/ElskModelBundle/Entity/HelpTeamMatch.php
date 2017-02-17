<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * HelpTeamMatch
 */
class HelpTeamMatch extends Timestampable
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

