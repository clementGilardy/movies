<?php

namespace Movies\BackOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Entity\Movies;
use Movies\MoviesBundle\Entity\Acteur;

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
    	->add('acteur','entity', array(
    			'class'=>'MoviesMoviesBundle:Acteur',
    			'property'=>'nom','expanded'=>false,
    			'multiple'=>true, 'label'=>true
    	))
    	->add('synopsis','textarea')
    	->add('dateRelease','date')
    	->add('image','file')
    	->add('Ajouter','submit')->getForm();
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:addMovie.html.twig',array('form'=>$form->createView()));
    }
    
    public function addActeurAction(Request $request)
    {
    	$acteur = new Acteur();
    	
    	$form = $this->get('form.factory')->createBuilder('form',$acteur)
    	->add('nom','text')
    	->add('prenom','text')
    	->add('biographie','textarea',array('required'=>false))
    	->add('Ajouter','submit')->getForm();
    	
    	$form->handleRequest($request);
    	
    	if ($form->isValid()) {
    			
    	
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($acteur);
    		$em->flush();
    		$request->getSession()->getFlashBag()->add('notice', 'Acteur bien enregistré !');
    		return $this->redirect($this->generateUrl('movies_back_office_addActeur'));
    	}
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:addActeur.html.twig',array('form'=>$form->createView()));
    }
}
