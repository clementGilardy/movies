<?php

namespace Movies\BackOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Entity\Movies;

class AdminController extends Controller
{
    public function indexAction(Request $request)
    {	
       return $this->render('MoviesBackOfficeBundle:Admin:index.html.twig');
    }
    
    public function addMovieAction(Request $request)
    {
    	$movie = new Movies();
    	
    	$form = $this->get('form.factory')->createBuilder('form',$movie)
    	->add('titre','text')
    	->add('acteur','entity',array('class'=>'MoviesMoviesBundle:Acteur'))
    	->add('synopsis','text')
    	->add('dateRelease','date')
    	->add('image','file')
    	->add('Ajouter','submit')->getForm();
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:addMovie.html.twig',array('form'=>$form->createView()));
    }
    
    public function addActeurAction(Request $request)
    {
    	return $this->render('MoviesBackOfficeBundle:Admin:addActeur.html.twig');
    }
}
