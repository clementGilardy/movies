<?php

namespace Movies\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Movies\UserBundle\Entity\User;

class SecurityController extends Controller
{
	public function loginAction(Request $request)
	{
		// Si le visiteur est déjà identifié, on le redirige vers l'accueil
		if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
			return $this->redirect($this->generateUrl('movies_moviesbundle_home'));
		}

		$session = $request->getSession();

		// On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
			$session->remove(SecurityContext::AUTHENTICATION_ERROR);
		}

		return $this->render('MoviesUserBundle:Security:login.html.twig', array(
				// Valeur du précédent nom d'utilisateur entré par l'internaute
				'last_username' => $session->get(SecurityContext::LAST_USERNAME),
				'error'         => $error,
		));
	}
	
	public function signinAction(Request $request)
	{
		
		$user = new User();
		
		$form = $this->get('form.factory')->createBuilder('form',$user)
		->add('username','text')
		->add('password','password')
		->add('email','email')
		->add('image','file')
		->add("S'inscrire",'submit')->getForm();
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			
			//TODO recovers the path of file's picture AND defind the salt for the password
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
		
			return $this->redirect($this->generateUrl('movies_moviesbundle_home'));
		}
		
		return $this->render('MoviesUserBundle:Security:signin.html.twig',array('form'=>$form->createView()));
	}
}