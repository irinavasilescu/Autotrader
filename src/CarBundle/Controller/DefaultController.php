<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/our-cars", name="offer")
     */
    public function indexAction()
    {
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $cars = $carRepository->findCarsWithDetails();

        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('search', TextType::class)
            ->getForm();

        return $this->render('@Car/Default/index.html.twig',
            [
                'cars' => $cars,
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @param $id
     * @Route("/car/{id}", name="show_car")
     * @return Response
     */
    public function showAction($id)
    {
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $car = $carRepository->findCarWithDetailsById($id);
        return $this->render('@Car/Default/show.html.twig', ['car' => $car]);
    }
}
