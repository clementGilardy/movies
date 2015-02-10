<?php

namespace Movies\MoviesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Entity\Series;

class SeriesController extends Controller
{
    public function indexAction()
    {	
       return $this->render('MoviesMoviesBundle:Series:series.html.twig');
    }
}
