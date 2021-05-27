<?php

namespace App\Controller;

use App\Entity\Cennik;
use App\Form\CennikType;
use App\Repository\CennikRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cennik')]
class CennikController extends AbstractController
{
    #[Route('/', name: 'cennik_index', methods: ['GET'])]
    public function index(CennikRepository $cennikRepository): Response
    {
        return $this->render('cennik/index.html.twig', [
            'cenniks' => $cennikRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'cennik_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $cennik = new Cennik();
        $form = $this->createForm(CennikType::class, $cennik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cennik);
            $entityManager->flush();

            return $this->redirectToRoute('cennik_index');
        }

        return $this->render('cennik/new.html.twig', [
            'cennik' => $cennik,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'cennik_show', methods: ['GET'])]
    public function show(Cennik $cennik): Response
    {
        return $this->render('cennik/show.html.twig', [
            'cennik' => $cennik,
        ]);
    }

    #[Route('/{id}/edit', name: 'cennik_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cennik $cennik): Response
    {
        $form = $this->createForm(CennikType::class, $cennik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cennik_index');
        }

        return $this->render('cennik/edit.html.twig', [
            'cennik' => $cennik,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'cennik_delete', methods: ['POST'])]
    public function delete(Request $request, Cennik $cennik): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cennik->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cennik);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cennik_index');
    }
}
