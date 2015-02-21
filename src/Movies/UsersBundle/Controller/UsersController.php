<?php

namespace Movies\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UsersController extends Controller
{
	/**
	 * @Route("/")
	 * @Template()
	 */
	public function indexAction()
	{
		return $this->render('MoviesUsersBundle:Users:index.html.twig');
	}
    
}
