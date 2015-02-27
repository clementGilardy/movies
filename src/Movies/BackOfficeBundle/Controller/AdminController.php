<?php

namespace Movies\BackOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function indexAction(Request $request)
    {	
       return $this->render('MoviesBackOfficeBundle:Admin:index.html.twig');
    }
    
    public function addMovieAction(Request $request)
    {
    	return $this->render('MoviesBackOfficeBundle:Admin:addMovie.html.twig');
    }
}
