<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * ElskCity
 */
class ElskCity extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cityName;

    /**
     * @var string
     */
    private $eventPeriodicity;

    /**
     * @var \DateTime
     */
    private $nextEventDate;

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
     * Set cityName
     *
     * @param string $cityName
     *
     * @return ElskCity
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Set eventPeriodicity
     *
     * @param string $eventPeriodicity
     *
     * @return ElskCity
     */
    public function setEventPeriodicity($eventPeriodicity)
    {
        $this->eventPeriodicity = $eventPeriodicity;

        return $this;
    }

    /**
     * Get eventPeriodicity
     *
     * @return string
     */
    public function getEventPeriodicity()
    {
        return $this->eventPeriodicity;
    }

    /**
     * Set nextEventDate
     *
     * @param \DateTime $nextEventDate
     *
     * @return ElskCity
     */
    public function setNextEventDate($nextEventDate)
    {
        $this->nextEventDate = $nextEventDate;

        return $this;
    }

    /**
     * Get nextEventDate
     *
     * @return \DateTime
     */
    public function getNextEventDate()
    {
        return $this->nextEventDate;
    }
}

