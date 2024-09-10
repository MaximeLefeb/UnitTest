<?php

namespace App\Controller;

use App\Entity\Dinosaur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response {
        $dinos = [
            new Dinosaur('Daisy', 'Velociraptor', 2),
            new Dinosaur('Maverick','Pterodactyl', 7),
            new Dinosaur('Big Eaty', 'Tyrannosaurus', 15),
            new Dinosaur('Dennis', 'Dilophosaurus', 6),
            new Dinosaur('Bumpy', 'Triceratops', 10),
        ];

        return $this->render('home/index.html.twig', [
            'dinos' => $dinos,
        ]);
    }
}
