<?php

namespace Elsk\CoreBundle\Controller;

use Doctrine\Common\Util\Debug;
use Elsk\ElskModelBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Elsk\ElskModelBundle\Entity\User;
use Symfony\Component\VarDumper\VarDumper;

class UserController extends Controller {

	public function indexAction(Request $request){
		$type = $request->query->get('type');

		$users = (empty($type))? $this->getUserRepo()->getAll() : $this->getUserRepo()->getAllByUserType($type);

		return new JsonResponse(['data' => $this->serializeResponse($users)]);
	}

	public function showAction(){

		$users = $this->getUserRepo()
		              ->getAll();
		$serializer = $this->serializeResponse($users);
		return new JsonResponse(['data' => $serializer->serialize($users, 'json')]);

		return new JsonResponse([
			"data" => [
				[
					'id' => 1,
					'firstName' => 'John Doe'
				],
				[
					'id' => 2,
					'firstName' => 'Jane Doe'
				]
			]
		]);
	}
  
	public function getUserAction($email){
		$user = $this->getDoctrine()->getManager()->getRepository('ElskModelBundle:User')->findOneBy(["email" => $email]);
		$serializer = $this->container->get('serializer');
		return new JsonResponse($serializer->serialize($user, 'json'));
		return new JsonResponse($this->getDoctrine()->getManager()->getRepository('ElskModelBundle:User')->findOneBy(["email"=>$email]));
	}

	public function registerRecipientAction(Request $request){
		return $this->createUser($request,"Recipient");
	}

	public function registerVolunteerAction(Request $request){
		return $this->createUser($request,"Volunteer");
	}

	public function registerLocalAdminAction(Request $request){
		$this->denyAccessUnlessGranted('ROLE_GLOBAL_ADMIN', null, 'Unable to access this page!');
		return $this->createUser($request,"LocalAdmin");
	}

	public function registerGlobalAdminAction(Request $request){
		$this->denyAccessUnlessGranted('ROLE_GLOBAL_ADMIN', null, 'Unable to access this page!');
		return $this->createUser($request,"GlobalAdmin");
	}
	
	private function createUser(Request $request,$type){
		$email = $request->request->get('email');
		$pass = $request->request->get('password');
		$firstName = $request->request->get('firstName');
		$lastName = $request->request->get('lastName');
		$phone = $request->request->get('phone');
		$cityName = $request->request->get('elskCity');
		
		if($email != null && $pass != null && $firstName != null && $lastName != null && $cityName != null){
			$util = $this->get("Utilities");
			if(!$util->validatePassword($pass))
				return new Response("Invalid Password");
			if(!$util->validateEmail($email))
				return new Response("Invalid Email");
			$city = $this->getDoctrine()->getRepository('ElskModelBundle:ElskCity')->findOneBy(["cityName"=>$cityName]);
			if($city == null)
				return new Response("Invalid City");
			
			$user = new User();
			$user->setEmail($email);
			$user->setPassword($pass);
			$user->setFirstName($firstName);
			$user->setLastName($lastName);
			$user->setPhone($phone);
			$user->setType($type);
			$user->setElskCity($city);
			$user->setElskCity($city);
			$user->setCreatedAt(new \DateTime());
			$user->setUpdatedAt(new \DateTime());
			$user->setLogin("yes");
			$user->setDeletedAt(null);
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
			$subject = "Welcome Email";
			$this->get("ElskMailer")->sendEmail(["html"=>$this->renderView("Emails/new$type.html.twig",['user'=>$user])],$subject,$user);
			return new Response("User created");
		}else
			return new Response("Most specify, email, password, firstName, lastName and elskCity");
	}

	/**
	 * @return UserRepository
	 */
	private function getUserRepo()
	{
		return $this->getDoctrine()
		            ->getRepository('ElskModelBundle:User');
	}

	/**
	 * @param $data
	 * @return object
	 */
	private function serializeResponse($data)
	{
		$serializer = $this->container->get('serializer');
		return $serializer->serialize($data, 'json');
	}


}
