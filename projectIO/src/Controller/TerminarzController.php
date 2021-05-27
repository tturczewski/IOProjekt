<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TerminarzController extends AbstractController
{
    #[Route('/terminarz', name: 'terminarz')]
    public function index(): Response
    {
        return $this->render('terminarz/index.html.twig', [
            'controller_name' => 'TerminarzController',
        ]);
    }
}
