<?php

namespace Movies\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActorController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MoviesActorBundle:Actor');
        $listActeurs = $repository->findAll();

        return $this->render('MoviesActorBundle:Actor:actors.html.twig',
        array('acteurs'=>$listActeurs));
    }

    public function showActorAction($id)
    {
        $actor = null;
        $role = null;
        if($id != null)
        {
            $repositoryActor = $this->getDoctrine()->getManager()->getRepository('MoviesActorBundle:Actor');
            $repositoryRole  =
            $this->getDoctrine()->getManager()->getRepository('MoviesActorBundle:Role');
            $actor = $repositoryActor->find($id);
            $role = $repositoryRole->findByActeur($actor);
        }
        return $this->render('MoviesActorBundle:Actor:showActor.html.twig',array('actor'=>$actor,
        'roles'=>$role));
    }
}
