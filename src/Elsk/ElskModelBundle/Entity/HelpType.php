<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * HelpType
 */
class HelpType extends Timestampable
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
     * @var boolean
     */
    private $requiredSpecialAbility;

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
     * @param boolean $requiredSpecialAbility
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
     * @return boolean
     */
    public function getRequiredSpecialAbility()
    {
        return $this->requiredSpecialAbility;
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


}
