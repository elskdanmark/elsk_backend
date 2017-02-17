<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * EmailGroup
 */
class EmailGroup extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $groupName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Elsk\ElskModelBundle\Entity\ElskCity
     */
    private $elskCity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set groupName
     *
     * @param string $groupName
     *
     * @return EmailGroup
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return EmailGroup
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set elskCity
     *
     * @param \Elsk\ElskModelBundle\Entity\ElskCity $elskCity
     *
     * @return EmailGroup
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

    /**
     * Add user
     *
     * @param \Elsk\ElskModelBundle\Entity\User $user
     *
     * @return EmailGroup
     */
    public function addUser(\Elsk\ElskModelBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Elsk\ElskModelBundle\Entity\User $user
     */
    public function removeUser(\Elsk\ElskModelBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}

