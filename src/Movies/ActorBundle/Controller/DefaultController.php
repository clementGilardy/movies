<?php

namespace Movies\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MoviesActorBundle:Default:index.html.twig', array('name' => $name));
    }
}
