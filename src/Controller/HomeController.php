<?php

namespace App\Controller;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/car', name: 'car_home')]
    public function Car(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('home/car.html.twig', [
            'vehicules' => $vehiculeRepository->findAll(),
        ]);
    }
}
