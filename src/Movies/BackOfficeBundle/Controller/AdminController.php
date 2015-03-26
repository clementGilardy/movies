<?php

namespace Movies\BackOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Form\MovieType;
use Movies\MoviesBundle\Entity\Movies;
use Movies\ActorBundle\Entity\Actor;
use Movies\ActorBundle\Entity\ActorRepository;
use Movies\MoviesBundle\Entity\Realisateur;
use Movies\MoviesBundle\Entity\Movies\MoviesBundle\Entity;
use Movies\MoviesBundle\Entity\Genre;

class AdminController extends Controller
{
    public function indexAction(Request $request)
    {	
       return $this->render('MoviesBackOfficeBundle:Admin:index.html.twig');
    }

    public function addGenreAction(Request $request)
    {
        $genre = new Genre();
        $form = $this->get('form.factory')->createBuilder('form',$genre)
        ->add('nom','text')
        ->add('Ajouter','submit')->getForm();
        
        $form->handleRequest($request);
    	 
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($genre);
    		$em->flush();
    		$request->getSession()->getFlashBag()->add('notice', 'Le genre '.$genre->getNom().' à bien été enregistré !');
    		return $this->redirect($this->generateUrl('movies_back_office_addGenre'));
    	}
    	
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:Genre/addGenre.html.twig',array('form'=>$form->createView()));

    }
    
    public function addMovieAction(Request $request)
    {
    	$movie = new Movies();
    	$form = $this->get('form.factory')->createBuilder('form',$movie)
    	->add('titre','text')
    	->add('realisateur','entity',array(
    			'class'=>'MoviesActorBundle:Actor',
    			'property'=>'nomComplet','expanded'=>false,
    			'multiple'=>false, 'label'=>true
    	))
    	->add('duration','integer')
       	->add('genres','entity',array(
    			'class'=>'MoviesMoviesBundle:Genre',
    			'property'=>'nom','expanded'=>false,
    			'multiple'=>true, 'label'=>true
    	))
        ->add('acteurs','entity',array(
                'class'=>'MoviesActorBundle:Actor',
                'property'=>'nomComplet','expanded'=>false,
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
    		return $this->redirect($this->generateUrl('movies_back_office_addMovies'));
    	}
    	
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:Movie/addMovie.html.twig',array('form'=>$form->createView()));
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
    	
    	return $this->render('MoviesBackOfficeBundle:Admin:Actor/addActeur.html.twig',array('form'=>$form->createView()));
    }
}
