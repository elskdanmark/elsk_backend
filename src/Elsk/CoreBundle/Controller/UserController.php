<?php namespace Elsk\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

	public function showAction(){
		$data  = ["data" => ['name' => 'John Doe']];
		$response = new Response(json_encode($data));
		$response->headers->set('Content-Type', 'application/json');
		$response->headers->set('Access-Control-Allow-Origin', '*');

		return $response;
	}
} 