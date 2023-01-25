<?php

namespace App\DataFixtures;

use App\Entity\Creation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CreationFixtures extends Fixture
{
  const CREATIONS = [
    ['Title'=>'Démantibulée', 'Description'=>'Acrylique et gouache', 'Size'=>'61x50cm', 'Image'=>'', 'Price'=>320, 'Category'=>'Peinture'], 
    ['Title'=>'Danseuse bleue', 'Description'=>'Acrylique et gouache', 'Size'=>'46x38cm', 'Image'=>'Danseuse-bleue-optimised3.jpg', 'Price'=>220, 'Category'=>'Peinture'],
    ['Title'=>'Yoko Kanno', 'Description'=>'Acrylique', 'Size'=>'63x63cm', 'Image'=>'Japonaise-optimised.jpg', 'Price'=>350, 'Category'=>'Peinture'], 
    ['Title'=>'La Nature meurt', 'Description'=>'Acrylique et gouache', 'Size'=>'46x38cm', 'Image'=>'Nu-final-optimised2.jpg', 'Price'=>220, 'Category'=>'Peinture'],
    ['Title'=>'La Nature(commande)', 'Description'=>'Acrylique', 'Size'=>'46x38cm', 'Image'=>'Nu-beige-avec-crane-optimised.jpg', 'Price'=>220, 'Category'=>'Peinture'],
  ];

  public function load(ObjectManager $manager): void
  {
    foreach (self::CREATIONS as $key => $one_creation) 
    {
      $creation = new Creation();
      $creation->setTitle($one_creation['Title']);
      $creation->setDescription($one_creation['Description']);
      $creation->setSize($one_creation['Size']);
      $creation->setImage($one_creation['Image']);
      $creation->setPrice($one_creation['Price']);
      $creation->setCategory($one_creation['Category']);

      $manager->persist($creation);
    }
    $manager->flush();
  }
}