<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * ElskCity
 */
class ElskCity
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ElskCity
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
     * @return ElskCity
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
     * @return ElskCity
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
}

