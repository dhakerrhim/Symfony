<?php

namespace App\Controller;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    #[Route('produit/{id}', name: 'app_prod_show', methods: ['GET'])]
    public function show(Vehicule $vehicule): Response
    {
        return $this->render('produit/index.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }
}
