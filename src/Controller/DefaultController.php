<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{

    #[Route('/', name: 'default_home', methods: ['GET'])]
    public function home(AdRepository $adRepository): Response
    {
        #1. Récupération des derniers articles
        $annonces = $adRepository->findAll();

        #2. Passer a la vue les informations reçues
        return $this->render('default/home.html.twig', [
            'annonces' => $annonces
        ]);
    }
}
