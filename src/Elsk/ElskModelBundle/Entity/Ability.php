<?php

namespace Elsk\ElskModelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ability
 */
class Ability extends Timestampable
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
	 * @var boolean
	 */
	private $isSpecialAbility;

	/**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $helpOffer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->helpOffer = new ArrayCollection();
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
     * @return Ability
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
     * @param HelpOffer $helpOffer
     *
     * @return Ability
     */
    public function addHelpOffer(HelpOffer $helpOffer)
    {
        $this->helpOffer[] = $helpOffer;

        return $this;
    }

    /**
     * Remove helpOffer
     *
     * @param HelpOffer $helpOffer
     */
    public function removeHelpOffer(HelpOffer $helpOffer)
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

    /**
     * Set isSpecialAbility
     *
     * @param boolean $isSpecialAbility
     *
     * @return Ability
     */
    public function setSpecialAbility($isSpecialAbility)
    {
        $this->isSpecialAbility = $isSpecialAbility;

        return $this;
    }

    /**
     * Get isSpecialAbility
     *
     * @return boolean
     */
    public function isSpecialAbility()
    {
        return $this->isSpecialAbility;
    }
}
