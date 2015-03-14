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
	
	public function signupAction(Request $request)
	{
		
		$user = new User();
		$user->setRoles(array('ROLE_USER'));
		$form = $this->get('form.factory')->createBuilder('form',$user)
		->add('username','text')
		->add('password','password')
		->add('email','email')
		->add("inscrire",'submit',array('label'=>'S\'inscrire'))->getForm();
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
			$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur '.$user->getUsername().' à bien été enregistré !');
			return $this->redirect($this->generateUrl('movies_moviesbundle_home'));
		}
		
		return $this->render('MoviesUserBundle:Security:signup.html.twig',array('form'=>$form->createView()));
	}
}