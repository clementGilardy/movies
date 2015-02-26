<?php

namespace Movies\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class BackOfficeController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    	if($this->get('security.context')->isGranted('ROLE_ADMIN'))
    	{
        	return $this->render('MoviesBackOfficeBundle:BackOffice:admin.html.twig');
    	}
    	else
    	{
    		throw new AccessDeniedException('Accès limité à l\'administration');
    	}
    }
    
    /**
     * @Route("/ajouter-une-video")
     * @Template()
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addMovieAction()
    {
    	return $this->render('MoviesBackOfficeBundle:BackOffice:addMovie.html.twig');
    }
}
