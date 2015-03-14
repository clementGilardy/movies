<?php

namespace Movies\SeriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeriesController extends Controller
{
    public function indexAction()
    {
        return $this->render('MoviesSeriesBundle:Series:index.html.twig');
    }
}
