<?php

namespace App\Controller;

use App\Entity\Creation;
use App\Form\CreationType;
use App\Repository\BookRepository;
use App\Repository\CreationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/creation')]
class CreationController extends AbstractController
{
    #[Route('/', name: 'app_creation_index', methods: ['GET'])]
    public function index(CreationRepository $creationRepository, BookRepository $bookRepository): Response
    {
        $creations = $creationRepository->findAll();
        $books = $bookRepository->findAll();

        return $this->render('creation/index.html.twig', [
            'creations' => $creations,
            'books' => $books,
        ]);
    }

    #[Route('/new', name: 'app_creation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CreationRepository $creationRepository): Response
    {
        $creation = new Creation();
        $form = $this->createForm(CreationType::class, $creation);
        $form->handleRequest($request); 
        

        if ($form->isSubmitted() && $form->isValid()) {
            $creationRepository->save($creation, true);

            return $this->redirectToRoute('app_creation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('creation/new.html.twig', [
            'creation' => $creation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creation_show', methods: ['GET'])]
    public function show(Creation $creation): Response
    {
        return $this->render('creation/show.html.twig', [
            'creation' => $creation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_creation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Creation $creation, CreationRepository $creationRepository): Response
    {
        $form = $this->createForm(CreationType::class, $creation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $creationRepository->save($creation, true);

            return $this->redirectToRoute('app_creation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('creation/edit.html.twig', [
            'creation' => $creation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creation_delete', methods: ['POST'])]
    public function delete(Request $request, Creation $creation, CreationRepository $creationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$creation->getId(), $request->request->get('_token'))) {
            $creationRepository->remove($creation, true);
        }

        return $this->redirectToRoute('app_creation_index', [], Response::HTTP_SEE_OTHER);
    }
}
