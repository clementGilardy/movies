<?php

namespace Movies\MoviesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Entity\Movies;

class MoviesController extends Controller
{
    public function indexAction()
    {	
    	$em = $this->getDoctrine()->getManager();
    	$test = $em->getRepository('MoviesMoviesBundle:Movies');
       return $this->render('MoviesMoviesBundle:Movies:index.html.twig',array('test'=>$test));
    }

    public function moviesAction(Request $request)
    {	
        return $this->render('MoviesMoviesBundle:Movies:films.html.twig'); 
    }

    public function seriesAction(Request $request)
    {
        return $this->render('MoviesMoviesBundle:Movies:series.html.twig');
    }
    
    public function addMovieAction()
    {
    	return $this->render('MoviesMoviesBundle:Movies:formAjoutMovie.html.twig');
    }
}
