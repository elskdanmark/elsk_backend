<?php

namespace Elsk\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return json_encode($name);// $this->render('ElskCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
