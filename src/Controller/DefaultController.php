<?php
namespace App\Controller;

use App\Repository\CreationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class DefaultController extends AbstractController
{
  #[Route('/', name: 'app_index')]
  public function index(CreationRepository $creationRepository): Response
  {
    return $this->render('index.html.twig', [
      'title'=>'Lila Jacobieski',
      'creations' => $creationRepository->findAll(),
  ]); 
  }
}
