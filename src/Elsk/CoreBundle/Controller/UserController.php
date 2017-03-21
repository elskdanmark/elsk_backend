<?php namespace Elsk\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Elsk\ElskModelBundle\Entity\User;

class UserController extends Controller {
	public function showAction(){
		return new JsonResponse(['users' => 'No users']);
	}

	public function registerRecipient($request){
		return $this->createUser($request,"Recipient");
	}

	public function registerVolunteer($request){
		return $this->createUser($request,"Volunteer");
	}

	public function registerLocalAdmin($request){
		$this->denyAccessUnlessGranted('ROLE_GLOBAL_ADMIN', null, 'Unable to access this page!');
		return $this->createUser($request,"LocalAdmin");
	}

	public function registerGlobalAdmin($request){
		$this->denyAccessUnlessGranted('ROLE_GLOBAL_ADMIN', null, 'Unable to access this page!');
		return $this->createUser($request,"GlobalAdmin");
	}
	
	private function createUser($request,$type){
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
			$city = $this->getDoctrine()->getRepository('Elsk:ElskModelBundle:Entity:ElskCity')->findByCityName($cityName);
			if($city == null)
				return new Response("Invalid City");
			
			$user = new User();
			$user->setEmail($email);
			$user->setPassword($pass);
			$user->setFirstName($firstName);
			$user->setLastName($lastName);
			$user->setPhone($phone);
			$user->setUserType($type);
			$user->setElskCity($city);
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
		
			//TODO Setup Email, with a spool to avoid user waiting on email send before response. http://symfony.com/doc/current/email/spool.html 
			return new Response("User created");
		}else
			return new Response("Most specify, email, password, firstName, lastName and elskCity");
	}
}