<?php

namespace Movies\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActorController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MoviesActorBundle:Actor');
        $listActeurs = $repository->findAll();
        return $this->render('MoviesActorBundle:Actor:actor.html.twig',
        array('acteurs'=>$listActeurs));
    }
}
