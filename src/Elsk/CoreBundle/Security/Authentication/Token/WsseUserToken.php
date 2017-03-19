<?php

namespace Elsk\CoreBundle\Security\Authentication\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class WsseUserToken extends AbstractToken {

	public $created;
	public $digest;
	public $nonce;

	public function __construct(array $roles = []){

		parent::__construct($roles);

		// If the user has roles, consider it authenticated
		$this->setAuthenticated(count($roles) > 0);
	}

	/**
	 * Returns the user credentials.
	 *
	 * @return mixed The user credentials
	 */
	public function getCredentials() {
		return '';
	}
}