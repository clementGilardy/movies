<?php

namespace Movies\MoviesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Movies\MoviesBundle\Entity\Movies;

class MoviesController extends Controller
{
    public function moviesAction(Request $request)
    {	
        $repo = $this->getDoctrine()->getManager()->getRepository('MoviesMoviesBundle:Movies');
        $listMovies = $repo->findAll();
        return $this->render('MoviesMoviesBundle:Movies:movies.html.twig',
                array('movies'=>$listMovies)); 
    }

    public function listGenreAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MoviesMoviesBundle:Genre'); 
        $listGenre = $repository->findAll();
        return $this->render('MoviesMoviesBundle:Genre:listGenre.html.twig',array('genres'=>$listGenre));
    }

    public function showMovieAction($id)
    {
        $movie = null;
        if($id != null)
        {
            $repository = $this->getDoctrine()->getManager()->getRepository('MoviesMoviesBundle:Movies');
            $movie = $repository->find($id);
        }

        return $this->render('MoviesMoviesBundle:Movies:showMovie.html.twig',array('movie'=>$movie));
    }
}
