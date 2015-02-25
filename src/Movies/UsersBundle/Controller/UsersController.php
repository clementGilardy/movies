<?php

namespace Movies\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Movies\UsersBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
	/**
	 * @Route("/user/{id}")
	 * @Template()
	 */
	public function indexAction($id = null)
	{
		$user = null;
		if(!empty($id))
		{
			$em = $this->getDoctrine()->getManager();
			$user = $em->getRepository('MoviesUsersBundle:Users')->find($id);
		}
		return $this->render('MoviesUsersBundle:Users:index.html.twig',array('user'=>$user,'id'=>$id));
	}
	
	/**
	 * @Route("/inscription")
	 * @Template()
	 */
	public function inscriptionAction(Request $request)
	{
		$user = new Users();
		
		$form = $this->get('form.factory')->createBuilder('form',$user)
		->add('nom','text',array('required'=>true))
		->add('prenom','text',array('required'=>true))
		->add('pseudo','text',array('required'=>true))
		->add('password','password',array('required'=>true))
		->add('email','email',array('required'=>true))
		->add('avatar','file')
		->add('S\'inscrire','submit')->getForm();
		
		$form->handleRequest($request);
		
		if($form->isValid())
		{
			//we uploaded the avatard for the user 
			if(!empty($user->getAvatar()))
			{
				$avatar = $user->getPath().$user->getPseudo().'_'.$user->getNom().'.jpg';
				move_uploaded_file($user->getAvatar(),$avatar);
				$user->setAvatar($avatar);
			}
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
			
			$request->getSession()->getFlashBag()->add('notice','Utilisateur bien enregistré');
			
			return $this->redirect($this->generateUrl('movies_users_users_index',array('id'=>$user->getId())));
		}
		
		return $this->render('MoviesUsersBundle:Users:inscription.html.twig',array('form'=>$form->createView()));
	}
    
}
