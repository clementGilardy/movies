<?php

namespace Movies\BackOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Entity\Movies;
use Movies\ActorBundle\Entity\Actor;
use Movies\MoviesBundle\Entity\Realisateur;
use Movies\MoviesBundle\Entity\Movies\MoviesBundle\Entity;

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
    	->add('realisateur','entity',array(
    			'class'=>'MoviesMoviesBundle:Realisateur',
    			'property'=>'nomComplet','expanded'=>false,
    			'multiple'=>false, 'label'=>true
    	))
    	->add('duration','integer')
       	->add('genres','entity',array(
    			'class'=>'MoviesMoviesBundle:Genre',
    			'property'=>'nom','expanded'=>false,
    			'multiple'=>true, 'label'=>true
    	))
    	->add('synopsis','textarea')
    	->add('dateRelease','date',array(
    			'format'=> 'yyyy-MM-dd',
    			'widget'=> 'single_text',
    			'attr' => array('placeholder'=>'YYYY-MM-DD')
    	))
    	->add('file','file')
    	->add('Ajouter','submit',array('label'=>'Ajouter un film'))->getForm();
    	
    	$form->handleRequest($request);
    	 
    	if ($form->isValid()) {
    		$movie->upload();
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($movie);
    		$em->flush();
    		$request->getSession()->getFlashBag()->add('notice', 'Le film '.$movie->getTitre().' à bien été enregistré !');
    		return $this->redirect($this->generateUrl('movies_back_office_addMovie'));
    	}
    	
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:Add/addMovie.html.twig',array('form'=>$form->createView()));
    }
    
    public function addActeurAction(Request $request)
    {
    	$acteur = new Actor();
    	
    	$form = $this->get('form.factory')->createBuilder('form',$acteur)
    	->add('nom','text')
    	->add('prenom','text')
    	->add('file')
    	->add('biographie','textarea',array('required'=>false))
    	->add('Ajouter','submit',array('label'=>'Ajouter un acteur'))->getForm();
    	
    	$form->handleRequest($request);
    	
    	if ($form->isValid()) 
    	{
			$acteur->setNomComplet($acteur->getPrenom().' '.$acteur->getNom());    			
    		$acteur->upload();
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($acteur);
    		$em->flush();
    		$request->getSession()->getFlashBag()->add('notice', 'L\'acteur '.$acteur->getNomComplet().' à bien été enregistré !');
    		return $this->redirect($this->generateUrl('movies_back_office_addActeur'));
    	}
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:Add/addActeur.html.twig',array('form'=>$form->createView()));
    }
    
    public function addRealisateurAction(Request $request)
    {
    	$realisateur = new Realisateur();
    	$form = $this->get('form.factory')->createBuilder('form',$realisateur)
    	->add('nom','text')
    	->add('prenom','text')
    	->add('Ajouter','submit')
    	->getForm();
    	
    	$form->handleRequest($request);
    	 
    	if ($form->isValid())
    	{
    		$realisateur->setNomComplet($realisateur->getPrenom().' '.$realisateur->getNom());
    		
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($realisateur);
    		$em->flush();
    		$request->getSession()->getFlashBag()->add('notice', 'Le réalisateur <strong>'.$realisateur->getNomComplet().'</strong> à bien été enregistré !');
    		return $this->redirect($this->generateUrl('movies_back_office_addRealisateur'));
    	}
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:Add/addRealisateur.html.twig',array('form'=>$form->createView()));
    }
}
