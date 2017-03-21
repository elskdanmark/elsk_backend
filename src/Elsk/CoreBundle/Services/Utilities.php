<?php namespace Elsk\CoreBundle\Services;

class Utilities extends Controller
{
	public function validatePassword($pass){
		//$pass validate password
		return preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,50}$/', $pass);
	}
	
	public function validateEmail($email){
		//$pass validate password
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}