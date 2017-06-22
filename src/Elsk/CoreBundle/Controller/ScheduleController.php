<?php

namespace Elsk\CoreBundle\Controller;

use Elsk\ElskModelBundle\Schedule\Schedule;
use Elsk\ElskModelBundle\Schedule\ScheduleGenerator;
use Elsk\ElskModelBundle\Schedule\ProcessUserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;

class ScheduleController extends Controller{

	const MYSQL_DATE_FORMAT = 'Y-m-d';

	public function indexAction(){
		$em = $this->getDoctrine()->getManager();
		$uc = new ProcessUserRequest($em);
		//get the help
		$he = $em->getRepository('ElskModelBundle:HelpEvent')->find(2);
		$sg = new ScheduleGenerator($he, $uc, $em);
		$planing = $sg->getPlanning();
		$response = new JsonResponse($planing);

		return $response;
	}
} 