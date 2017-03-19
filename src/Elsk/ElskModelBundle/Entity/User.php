<?php

namespace Elsk\ElskModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 */
class User extends Timestampable implements UserInterface, \Serializable
{
	const USER_TYPE = ['ADMIN', 'USER', 'SUPER_ADMIN'];
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
    private $username;

    /**
     * @var string
     */
    private $password;

	/**
	 * @var string
	 */
	private $isActive;

    /**
     * @var string
     */
    private $userType;

	/**
	 * @var string
	 */
	private $role;

    /**
     * @var ElskCity
     */
    private $elskCity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emailGroup;

	/**
	 * Constructor
	 *
	 * @param $userType
	 */
    public function __construct($userType)
    {
	    parent::__construct();
        $this->emailGroup = new ArrayCollection();
	    $this->isActive = true;
	    $this->role = (in_array($userType, USER_TYPE))? 'ROLE_'.$userType : 'ROLE_USER';
	    $this->userType = $userType;
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
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
     * @param ElskCity $elskCity
     *
     * @return User
     */
    public function setElskCity(ElskCity $elskCity = null)
    {
        $this->elskCity = $elskCity;

        return $this;
    }

    /**
     * Get elskCity
     *
     * @return ElskCity
     */
    public function getElskCity()
    {
        return $this->elskCity;
    }

    /**
     * Add emailGroup
     *
     * @param EmailGroup $emailGroup
     *
     * @return User
     */
    public function addEmailGroup(EmailGroup $emailGroup)
    {
        $this->emailGroup[] = $emailGroup;

        return $this;
    }

    /**
     * Remove emailGroup
     *
     * @param EmailGroup $emailGroup
     */
    public function removeEmailGroup(EmailGroup $emailGroup)
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

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of object
	 *
	 * @link http://php.net/manual/en/serializable.serialize.php
	 * @return string the string representation of the object or null
	 * @see \Serializable::serialize()
	 */
	public function serialize() {
		return serialize(
			[
				$this->id,
				$this->username,
				$this->password,
			]
		);
	}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Constructs the object
	 *
	 * @link http://php.net/manual/en/serializable.unserialize.php
	 * @param string $serialized <p>
	 * The string representation of the object.
	 * </p>
	 * @return void
	 * @see \Serializable::serialize()
	 */
	public function unserialize($serialized) {
		list (
			$this->id,
			$this->username,
			$this->password,
			) = unserialize($serialized);
	}

	/**
	 * Returns the roles granted to the user.
	 *
	 * <code>
	 * public function getRoles()
	 * {
	 *     return array('ROLE_USER');
	 * }
	 * </code>
	 *
	 * Alternatively, the roles might be stored on a ``roles`` property,
	 * and populated in any number of different ways when the user object
	 * is created.
	 *
	 * @return void (Role|string)[] The user roles
	 */
	public function getRoles() {
		return [$this->role];
	}

	/**
	 * Returns the salt that was originally used to encode the password.
	 *
	 * This can return null if the password was not encoded using a salt.
	 *
	 * @return string|null The salt
	 */
	public function getSalt() {
		return null;
	}

	/**
	 * Returns the username used to authenticate the user.
	 *
	 * @return string The username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Removes sensitive data from the user.
	 *
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 */
	public function eraseCredentials() {

	}
}
