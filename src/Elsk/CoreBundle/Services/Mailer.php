<?php namespace Elsk\CoreBundle\Services;

class Mailer extends Controller
{
	public function __construct($mailer){
		$this->mailer = $mailer;
	}
	
	/**
	 * 
	 * @param string array $msg, indexes, html/text
	 * @param string $subject
	 * @param Elsk\ElskModelBundle\User $recipient
	 * @param string $sender
	 * @return boolean
	 */
	public function sendEmail($msg,$subject,Elsk\ElskModelBundle\User $recipient,$sender="info@elskdanmark.dk"){
		$message = \Swift_Message::newInstance()->setSubject($subject)->setFrom($sender)->setTo($recipient->getEmail())
		->setBody($msg["html"],'text/html');
		if(isset($msg["text"]))
			$message->addPart($msg["text"],'text/plain');
		return $this->mailer->send($message);
	}
}