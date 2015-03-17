<?php

namespace Movies\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('MoviesHomeBundle:Home:index.html.twig');
    }
}
