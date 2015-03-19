<?php

namespace Movies\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActorController extends Controller
{
    public function indexAction()
    {
        return $this->render('MoviesActorBundle:Actor:actor.html.twig');
    }
}
