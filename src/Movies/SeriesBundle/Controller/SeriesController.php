<?php

namespace Movies\SeriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SeriesController extends Controller
{
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MoviesSeriesBundle:Serie');
        $listSeries = $repository->findAll();

        return $this->render('MoviesSeriesBundle:Series:series.html.twig',array('series'=>$listSeries));
    }

    public function showSerieAction($id)
    {
        $serie = null;
        if($id != null)
        {
            $serie =  $this->getDoctrine()->getManager()->getRepository('MoviesSeriesBundle:Serie')->find($id);
        }
        return $this->render('MoviesSeriesBundle:Series:showSerie.html.twig',array('serie'=>$serie));
    }

}
