<?php

namespace Movies\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BackOfficeController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('MoviesBackOfficeBundle:BackOffice:admin.html.twig');
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
