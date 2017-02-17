<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * SpecialAbility
 */
class SpecialAbility extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $abilityName;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $helpOffer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->helpOffer = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set abilityName
     *
     * @param string $abilityName
     *
     * @return SpecialAbility
     */
    public function setAbilityName($abilityName)
    {
        $this->abilityName = $abilityName;

        return $this;
    }

    /**
     * Get abilityName
     *
     * @return string
     */
    public function getAbilityName()
    {
        return $this->abilityName;
    }

    /**
     * Add helpOffer
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpOffer $helpOffer
     *
     * @return SpecialAbility
     */
    public function addHelpOffer(\Elsk\ElskModelBundle\Entity\HelpOffer $helpOffer)
    {
        $this->helpOffer[] = $helpOffer;

        return $this;
    }

    /**
     * Remove helpOffer
     *
     * @param \Elsk\ElskModelBundle\Entity\HelpOffer $helpOffer
     */
    public function removeHelpOffer(\Elsk\ElskModelBundle\Entity\HelpOffer $helpOffer)
    {
        $this->helpOffer->removeElement($helpOffer);
    }

    /**
     * Get helpOffer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHelpOffer()
    {
        return $this->helpOffer;
    }
}

