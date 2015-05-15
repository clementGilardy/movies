<?php

namespace Movies\HomeBundle\Controller;

use Movies\MoviesBundle\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MoviesMoviesBundle:Movies');
        $movies = $repository->findAll();
        return $this->render('MoviesHomeBundle:Home:index.html.twig',array('movies'=>$movies));
    }
}
