<?php namespace Elsk\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

	public function showAction(){
		$response = new Response(json_encode(['users' => 'No users']));
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}
} 