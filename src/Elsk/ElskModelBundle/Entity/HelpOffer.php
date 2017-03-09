<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * HelpOffer
 */
class HelpOffer extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $transport;

    /**
     * @var string
     */
    private $helpCategory;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $daysAvalaible;

	/**
	 * @var date
	 */
	private $requestDate;

    /**
     * @var \Elsk\ElskModelBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $specialAbility;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->specialAbility = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set transport
     *
     * @param string $transport
     *
     * @return HelpOffer
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set helpCategory
     *
     * @param string $helpCategory
     *
     * @return HelpOffer
     */
    public function setHelpCategory($helpCategory)
    {
        $this->helpCategory = $helpCategory;

        return $this;
    }

    /**
     * Get helpCategory
     *
     * @return string
     */
    public function getHelpCategory()
    {
        return $this->helpCategory;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return HelpOffer
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set daysAvalaible
     *
     * @param string $daysAvalaible
     *
     * @return HelpOffer
     */
    public function setDaysAvalaible($daysAvalaible)
    {
        $this->daysAvalaible = $daysAvalaible;

        return $this;
    }

    /**
     * Get daysAvalaible
     *
     * @return string
     */
    public function getDaysAvalaible()
    {
        return $this->daysAvalaible;
    }

    /**
     * Set requestDate
     *
     * @param \DateTime $requestDate
     *
     * @return HelpOffer
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
     * Get requestDate
     *
     * @return \DateTime
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

   /**
     * Set user
     *
     * @param \Elsk\ElskModelBundle\Entity\User $user
     *
     * @return HelpOffer
     */
    public function setUser(\Elsk\ElskModelBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Elsk\ElskModelBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add specialAbility
     *
     * @param \Elsk\ElskModelBundle\Entity\SpecialAbility $specialAbility
     *
     * @return HelpOffer
     */
    public function addSpecialAbility(\Elsk\ElskModelBundle\Entity\SpecialAbility $specialAbility)
    {
        $this->specialAbility[] = $specialAbility;

        return $this;
    }

    /**
     * Remove specialAbility
     *
     * @param \Elsk\ElskModelBundle\Entity\SpecialAbility $specialAbility
     */
    public function removeSpecialAbility(\Elsk\ElskModelBundle\Entity\SpecialAbility $specialAbility)
    {
        $this->specialAbility->removeElement($specialAbility);
    }

    /**
     * Get specialAbility
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecialAbility()
    {
        return $this->specialAbility;
    }
}

