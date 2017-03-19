<?php

namespace Elsk\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name=null)
    {
        return json_encode("Apps Working");
        // $this->render('ElskCoreBundle:Default:index.html.twig',array('name' => $name));
    }
}
