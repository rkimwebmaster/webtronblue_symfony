<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/audit', name: 'app_audit')]
    public function audit(): Response
    {
        return $this->render('accueil/audit.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/gallerie', name: 'app_gallerie')]
    public function gallerie(): Response
    {
        return $this->render('accueil/gallerie.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/hacking', name: 'app_hacking')]
    public function hacking(): Response
    {
        return $this->render('accueil/hacking.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/webHosting', name: 'app_web_hosting')]
    public function webHosting(): Response
    {
        return $this->render('accueil/web-hosting.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/qsn', name: 'app_qsn')]
    public function qsn(): Response
    {
        return $this->render('accueil/qsn.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    
    #[Route('/partenaires', name: 'app_partenaires')]
    public function partenaires(): Response
    {
        return $this->render('accueil/partenaires.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    
    #[Route('/privacy', name: 'app_privacy')]
    public function privacy(): Response
    {
        return $this->render('accueil/privacy.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
