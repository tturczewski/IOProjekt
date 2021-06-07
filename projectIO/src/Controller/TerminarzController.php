<?php

namespace App\Controller;

use App\Entity\Terminarz;
use App\Form\TerminarzType;
use App\Repository\TerminarzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/terminarz')]
class TerminarzController extends AbstractController
{
    #[Route('/', name: 'terminarz_index', methods: ['GET'])]
    public function index(TerminarzRepository $terminarzRepository): Response
    {
        return $this->render('terminarz/index.html.twig', [
            'terminarzs' => $terminarzRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'terminarz_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $terminarz = new Terminarz();
        $form = $this->createForm(TerminarzType::class, $terminarz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($terminarz);
            $entityManager->flush();

            return $this->redirectToRoute('terminarz_index');
        }

        return $this->render('terminarz/new.html.twig', [
            'terminarz' => $terminarz,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'terminarz_show', methods: ['GET'])]
    public function show(Terminarz $terminarz): Response
    {
        return $this->render('terminarz/show.html.twig', [
            'terminarz' => $terminarz,
        ]);
    }

    #[Route('/{id}/edit', name: 'terminarz_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Terminarz $terminarz): Response
    {
        $form = $this->createForm(TerminarzType::class, $terminarz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('terminarz_index');
        }

        return $this->render('terminarz/edit.html.twig', [
            'terminarz' => $terminarz,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'terminarz_delete', methods: ['POST'])]
    public function delete(Request $request, Terminarz $terminarz): Response
    {
        if ($this->isCsrfTokenValid('delete'.$terminarz->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($terminarz);
            $entityManager->flush();
        }

        return $this->redirectToRoute('terminarz_index');
    }
}
