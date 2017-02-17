<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * Schedule
 */
class Schedule extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Elsk\ElskModelBundle\Entity\HelpEvent
     */
    private $helpEvent;


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
     * Set helpEvent
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpEvent $helpEvent
     *
     * @return Schedule
     */
    public function setHelpEvent(\Elsk\ElskModelBundle\Entity\HelpEvent $helpEvent = null)
    {
        $this->helpEvent = $helpEvent;

        return $this;
    }

    /**
     * Get helpEvent
     *
     * @return \Elsk\ElskModelBundle\Entity\HelpEvent
     */
    public function getHelpEvent()
    {
        return $this->helpEvent;
    }
}

