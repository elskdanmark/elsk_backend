<?php namespace Elsk\CoreBundle\Services;

use Elsk\ElskModelBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Mailer extends Controller
{
	public function __construct($mailer){
		$this->mailer = $mailer;
	}

	/**
	 *
	 * @param string $msg
	 * @param string $subject
	 * @param User $recipient
	 * @param string $sender
	 * @return boolean
	 */
	public function sendEmail($msg, $subject, User $recipient, $sender="info@elskdanmark.dk"){
		$message = \Swift_Message::newInstance()->setSubject($subject)->setFrom($sender)->setTo($recipient->getEmail())
		->setBody($msg["html"],'text/html');
		if(isset($msg["text"]))
			$message->addPart($msg["text"],'text/plain');
		return $this->mailer->send($message);
	}
}
