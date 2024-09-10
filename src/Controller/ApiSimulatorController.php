<?php
namespace App\Controller;

use App\Entity\Dinosaur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiSimulatorController extends AbstractController {
    #[Route('/api/simulator', name: 'app_api_simulator')]
    public function index(SerializerInterface $serializer): JsonResponse {
        $dinosaurs = [
            new Dinosaur('Daisy', 'Velociraptor', 2),
            new Dinosaur('Maverick','Pterodactyl', 7),
            new Dinosaur('Big Eaty', 'Tyrannosaurus', 15),
            new Dinosaur('Dennis', 'Dilophosaurus', 6),
            new Dinosaur('Bumpy', 'Triceratops', 10),
        ];

        $jsonData = $serializer->serialize($dinosaurs, 'json');

        return new JsonResponse($jsonData, 200, [], true);
    }
}