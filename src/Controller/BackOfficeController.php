<?php

namespace App\Controller;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use App\Entity\Location;
use App\Form\LocationType;
use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackOfficeController extends AbstractController
{
    #[Route('/back/office', name: 'app_back_office')]
    public function index(VehiculeRepository $vehiculeRepository, LocationRepository $locationRepository): Response
    {
        $availableCount = $vehiculeRepository->countByStatus(1);
        $unavailableCount = $vehiculeRepository->countByStatus(0);
        $confirmer = $locationRepository->countByStatus(1);
        $pending = $locationRepository->countByStatus(0);

        $data = [
            ['label' => 'Vehicule Disponibile', 'value' => $availableCount],
            ['label' => 'Vehicule Indisponibile', 'value' => $unavailableCount],
            ['label' => 'Locations effectuer', 'value' => 20], // You can replace 20 with the actual count of completed locations
        ];
        return $this->render('back_office/index.html.twig', [
            'availableCount' => $availableCount,
            'unavailableCount' => $unavailableCount,
            'confirmer' => $confirmer,
            'pending' => $pending,
        ]);
   
   
    }
}
