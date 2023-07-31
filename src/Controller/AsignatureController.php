<?php

namespace App\Controller;

use App\Entity\Asignature;
use App\Form\AsignatureType;
use App\Repository\AsignatureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/asignature')]
class AsignatureController extends AbstractController
{
    #[Route('/', name: 'app_asignature_index', methods: ['GET'])]
    public function index(AsignatureRepository $asignatureRepository): Response
    {
        return $this->render('asignature/index.html.twig', [
            'asignatures' => $asignatureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_asignature_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $asignature = new Asignature();
        $form = $this->createForm(AsignatureType::class, $asignature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($asignature);
            $entityManager->flush();

            return $this->redirectToRoute('app_asignature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('asignature/new.html.twig', [
            'asignature' => $asignature,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_asignature_show', methods: ['GET'])]
    public function show(Asignature $asignature): Response
    {
        return $this->render('asignature/show.html.twig', [
            'asignature' => $asignature,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_asignature_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Asignature $asignature, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AsignatureType::class, $asignature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_asignature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('asignature/edit.html.twig', [
            'asignature' => $asignature,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_asignature_delete', methods: ['POST'])]
    public function delete(Request $request, Asignature $asignature, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$asignature->getId(), $request->request->get('_token'))) {
            $entityManager->remove($asignature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_asignature_index', [], Response::HTTP_SEE_OTHER);
    }
}
