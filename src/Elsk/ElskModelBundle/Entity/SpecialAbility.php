<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * SpecialAbility
 */
class SpecialAbility
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SpecialAbility
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
     * @return SpecialAbility
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
     * @return SpecialAbility
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

