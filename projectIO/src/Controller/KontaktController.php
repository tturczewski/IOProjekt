<?php

namespace App\Controller;

use App\Entity\Kontakt;
use App\Form\KontaktType;
use App\Repository\KontaktRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/kontakt')]
class KontaktController extends AbstractController
{
    #[Route('/', name: 'kontakt_index', methods: ['GET'])]
    public function index(KontaktRepository $kontaktRepository): Response
    {
        return $this->render('kontakt/index.html.twig', [
            'kontakts' => $kontaktRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'kontakt_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $kontakt = new Kontakt();
        $form = $this->createForm(KontaktType::class, $kontakt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kontakt);
            $entityManager->flush();

            return $this->redirectToRoute('kontakt_index');
        }

        return $this->render('kontakt/new.html.twig', [
            'kontakt' => $kontakt,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'kontakt_show', methods: ['GET'])]
    public function show(Kontakt $kontakt): Response
    {
        return $this->render('kontakt/show.html.twig', [
            'kontakt' => $kontakt,
        ]);
    }

    #[Route('/{id}/edit', name: 'kontakt_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kontakt $kontakt): Response
    {
        $form = $this->createForm(KontaktType::class, $kontakt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kontakt_index');
        }

        return $this->render('kontakt/edit.html.twig', [
            'kontakt' => $kontakt,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'kontakt_delete', methods: ['POST'])]
    public function delete(Request $request, Kontakt $kontakt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kontakt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kontakt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kontakt_index');
    }
}
