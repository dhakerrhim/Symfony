<?php

namespace App\Controller;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openweathermap.org/data/2.5/weather?q=Tunis&appid=a0f2555640582759910dbd717e8d1926');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Parse the response to JSON
        $data = json_decode($response, true);
        $vehicules = $vehiculeRepository->recherche();
        // Access the data
        $ip_address = $_SERVER['REMOTE_ADDR'];
        
        return $this->render('home/car.html.twig', [
            'vehicules' => $vehiculeRepository->findAll(),
            'city' => $data['name'],
            'temperature' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'windSpeed' => $data['wind']['speed'],
            'humidity' => $data['main']['humidity'],
            'vehiculesF' => $vehicules,
        ]);
    }
    #[Route('/search', name: 'search')]
    public function search( VehiculeRepository $vehiculeRepository):Response
    {
        $vehicules = $vehiculeRepository->recherche();

        return $this->render('home/searchcar.html.twig', [
            'vehiculesF' => $vehicules,
           
        ]);
    }
    #[Route('/weather', name: 'weather')]
    public function getWeather() : Response
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openweathermap.org/data/2.5/weather?q=Tunis&appid=a0f2555640582759910dbd717e8d1926');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Parse the response to JSON
        $data = json_decode($response, true);
        
        // Access the data
    

        return $this->render('home/car.html.twig', [
            'city' => $data['name'],
            'temperature' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'windSpeed' => $data['wind']['speed'],
            'humidity' => $data['main']['humidity'],
            // ...
        ]);
    
    }
    
}
