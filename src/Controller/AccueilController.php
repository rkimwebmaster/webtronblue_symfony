<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\NewsLetter;
use App\Repository\ContactRepository;
use App\Repository\NewsLetterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/newsLetter', name: 'app_newsLettter')]
    public function creationNewsLetter(Request $request, NewsLetterRepository $newsLetterRepository): Response
    {
        // dd($request->get );
        // dd($request->get('email'));
        $email = $request->get('email');
        $checkDoublon = $newsLetterRepository->findOneBy(['email' => $email]);
        if ($checkDoublon) {
            $this->addFlash("warning", "Vous êtes déjà enregistré sur notre site, Merci. ");
            return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
        }
        $newsLetter = new NewsLetter($email);
        $newsLetterRepository->save($newsLetter, true);
        $this->addFlash("success", "Merci pour la confiance, vous recevrez un mail dans votre boite. ");
        return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/creationContact', name: 'app_creation_ontact')]
    public function creationContact(Request $request, ContactRepository $contactRepository): Response
    {

        $nom = $request->get('nom');
        $email = $request->get('email');
        $sujet = $request->get('sujet');
        $message = $request->get('message');

        $contact = new Contact($nom, $email, $sujet, $message);

        $contactRepository->save($contact, true);

        $this->addFlash("success", "Merci pour la confiance, vous recevrez un mail dans votre boite. ");
        return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
    }
}
