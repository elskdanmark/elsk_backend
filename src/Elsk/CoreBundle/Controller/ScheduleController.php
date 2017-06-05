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
	/*	$em = $this->getDoctrine()->getManager();
		$uc = new ProcessUserRequest($em);
		$uc->assignCategory(2);*/
		/*$s = new ScheduleGenerator();
		$data = $s->custom_hungarian();*/
		$em = $this->getDoctrine()->getManager();
		$uc = new ProcessUserRequest($em);
		$he = $em->getRepository('ElskModelBundle:HelpEvent')->find(1);
		$sg = new ScheduleGenerator($he, $uc, $em);
		//$data = $sg->getAllEventHelpRequest();
		$data = $sg->createCostMatrix();
		VarDumper::dump($data);
		$response = new JsonResponse("");

		return $response;
	}
} 