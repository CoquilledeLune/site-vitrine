<?php
namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\CreationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class DefaultController extends AbstractController
{
  #[Route('/', name: 'app_index')]
  public function index(CreationRepository $creationRepository, BookRepository $bookRepository): Response
  {
    return $this->render('index.html.twig', [
      'title'=>'Lila Jacobieski',
      'creations' => $creationRepository->findAll(),
      'books' => $bookRepository->findAll(),
  ]); 
  }
}
