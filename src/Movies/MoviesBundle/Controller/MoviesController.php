<?php

namespace Movies\MoviesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Entity\Movies;

class MoviesController extends Controller
{
    public function indexAction(Request $request)
    {	
    	$em = $this->getDoctrine()->getManager();
    	$movies = $em->getRepository('MoviesMoviesBundle:Movies')->findAll();
       return $this->render('MoviesMoviesBundle:Movies:index.html.twig',array('movies'=>$movies));
    }

    public function moviesAction(Request $request)
    {	
        return $this->render('MoviesMoviesBundle:Movies:films.html.twig'); 
    }
}
