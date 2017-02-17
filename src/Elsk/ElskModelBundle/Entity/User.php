<?php

namespace Elsk\ElskModelBundle\Entity;

/**
 * User
 */
class User extends Timestampable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $userType;

    /**
     * @var \Elsk\ElskModelBundle\Entity\ElskCity
     */
    private $elskCity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emailGroup;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emailGroup = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set userType
     *
     * @param string $userType
     *
     * @return User
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set elskCity
     *
     * @param \Elsk\ElskModelBundle\Entity\ElskCity $elskCity
     *
     * @return User
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
     * Add emailGroup
     *
     * @param \Elsk\ElskModelBundle\Entity\EmailGroup $emailGroup
     *
     * @return User
     */
    public function addEmailGroup(\Elsk\ElskModelBundle\Entity\EmailGroup $emailGroup)
    {
        $this->emailGroup[] = $emailGroup;

        return $this;
    }

    /**
     * Remove emailGroup
     *
     * @param \Elsk\ElskModelBundle\Entity\EmailGroup $emailGroup
     */
    public function removeEmailGroup(\Elsk\ElskModelBundle\Entity\EmailGroup $emailGroup)
    {
        $this->emailGroup->removeElement($emailGroup);
    }

    /**
     * Get emailGroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmailGroup()
    {
        return $this->emailGroup;
    }
}

