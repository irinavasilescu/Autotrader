<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/our-cars", name="offer")
     */
    public function indexAction()
    {
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $cars = $carRepository->findAll();
        return $this->render('@Car/Default/index.html.twig', ['cars' => $cars]);
    }

    /**
     * @param $id
     * @Route("/car/{id}", name="show_car")
     * @return Response
     */
    public function showAction($id)
    {
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $car = $carRepository->find($id);
        return $this->render('@Car/Default/show.html.twig', ['car' => $car]);
    }
}
