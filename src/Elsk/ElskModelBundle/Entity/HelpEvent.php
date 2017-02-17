<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * HelpEvent
 */
class HelpEvent extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var \Elsk\ElskModelBundle\Entity\ElskCity
     */
    private $elskCity;


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
     * Set duration
     *
     * @param integer $duration
     *
     * @return HelpEvent
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return HelpEvent
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return HelpEvent
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set elskCity
     *
     * @param \Elsk\ElskModelBundle\Entity\ElskCity $elskCity
     *
     * @return HelpEvent
     */
    public function setElskCity(\Elsk\ElskModelBundle\Entity\ElskCity $elskCity = null)
    {
        $this->elskCity = $elskCity;

        return $this;
    }

    /**
     * Get elskCity
     *
     * @return \Elsk\ElskModelBundle\Entity\ElskCity
     */
    public function getElskCity()
    {
        return $this->elskCity;
    }
}

