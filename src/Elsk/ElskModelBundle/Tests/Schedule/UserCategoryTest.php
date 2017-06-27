<?php

namespace Elsk\ElskModelBundle\Tests\Schedule;

use Elsk\ElskModelBundle\Schedule\ProcessUserRequest;
use Elsk\ElskModelBundle\Entity\User;
use PHPUnit\Framework\TestCase;

class UserCategoryTest extends TestCase {

	public function testAssignCategory(){
		$userCategory =  new ProcessUserRequest();
		$recipientType = User::USER_TYPE[2];
		$user = new User($recipientType);
		$userCategory->assignCategory($user);
	}
} 