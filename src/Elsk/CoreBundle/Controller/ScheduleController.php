<?php

namespace Elsk\CoreBundle\Controller;

use Elsk\ElskModelBundle\Schedule\Schedule;
use Elsk\ElskModelBundle\Schedule\ScheduleGenerator;
use Elsk\ElskModelBundle\Schedule\UserCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ScheduleController extends Controller{

	public function indexAction(){
	/*	$em = $this->getDoctrine()->getManager();
		$uc = new UserCategory($em);
		$uc->assignCategory(2);*/
		$s = new ScheduleGenerator();
		$data = $s->custom_hungarian();
		$response = new JsonResponse($data);

		return $response;
	}
} 