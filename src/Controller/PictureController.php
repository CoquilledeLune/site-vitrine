<?php

namespace App\Controller;

use App\Entity\Creation;
use App\Form\CreationPictureType;
use App\Repository\CreationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PictureController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/creation/picture', name: 'creation_picture')]
    public function addCreationPicture(Request $request, CreationRepository $creationRepository): Response 
        {
          $creationPicture = new Creation();
          $form = $this->createForm(CreationPictureType::class, $creationPicture);
          $form->handleRequest($request);

          

        // $creationPicture = $creationRepository->findOneBy([
        //     'creation' => $this->getImage(),
        // ]);

        // /** @var Creation $creation */
        // $creation = $this->getImage();

        // if ($creationPicture == null) {
        //     $creationPicture = new Creation();
        //     $creationPicture->setImage($creation);
        // }

        // $form = $this->createForm(CreationPictureType::class, $creationPicture);

        // $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        //   $creationRepository->save($creationPicture, true);
          $creationRepository->save($creationPicture, true);
        }
        return $this->renderForm('picture/new.html.twig', [
            'form' => $form,
            'creationPicture' => $creationPicture
        ]);
    }
}