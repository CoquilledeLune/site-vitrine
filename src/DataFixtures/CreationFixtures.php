<?php

namespace App\DataFixtures;

use App\Entity\Creation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CreationFixtures extends Fixture
{
  const CREATIONS = [
    ['Title'=>'Démantibulée', 'Description'=>'Acrylique et gouache', 'Size'=>'61x50cm', 'Image'=>'Demantibulee-optimised.jpg', 'Price'=>320, 'Category'=>'Peinture'], 
    ['Title'=>'Danseuse bleue', 'Description'=>'Acrylique et gouache', 'Size'=>'46x38cm', 'Image'=>'Danseuse-bleue-optimised3.jpg', 'Price'=>220, 'Category'=>'Peinture'],
    ['Title'=>'Yoko Kanno', 'Description'=>'Acrylique', 'Size'=>'63x63cm', 'Image'=>'Japonaise-optimised.jpg', 'Price'=>350, 'Category'=>'Peinture'], 
    ['Title'=>'La Nature meurt', 'Description'=>'Acrylique et gouache', 'Size'=>'46x38cm', 'Image'=>'Nu-final-optimised2.jpg', 'Price'=>220, 'Category'=>'Peinture'],
    ['Title'=>'La Nature(commande)', 'Description'=>'Acrylique', 'Size'=>'46x38cm', 'Image'=>'Nu-beige-avec-crane-optimised.jpg', 'Price'=>220, 'Category'=>'Peinture'],
    ['Title'=>'La Femme-chat', 'Description'=>'Acrylique et gouache', 'Size'=>'46x38cm', 'Image'=>'Femme-chat-grd-format-optimised2.jpg', 'Price'=>220, 'Category'=>'Peinture'],
    ['Title'=>'Ballerine', 'Description'=>'Acrylique et gouache', 'Size'=>'27x22cm', 'Image'=>'Ballerine-fond-noir-optimised3.jpg', 'Price'=>80, 'Category'=>'Peinture'],
    ['Title'=>'Danseuse hip hop', 'Description'=>'Acrylique et gouache', 'Size'=>'61x50cm', 'Image'=>'danseuse-hiphop-optimised.jpg', 'Price'=>320, 'Category'=>'Peinture'],
    ['Title'=>'Mains', 'Description'=>'Acrylique', 'Size'=>'46x38cm', 'Image'=>'Toile-mains-optimised4.jpg', 'Price'=>220, 'Category'=>'Peinture'],
    ['Title'=>'Aquarelle personnalisée', 'Description'=>'Aquarelle, crayons et feutres', 'Size'=>'21x30', 'Image'=>'Aquarelle-personnalisée-optimised.jpg', 'Price'=>0, 'Category'=>'Peinture'],
    ['Title'=>'Robe pour le Musée des Tissus de Lyon', 'Description'=>'Tissus, rafia, fils de soie, papier mâché, acrylique', 'Size'=>'40', 'Image'=>'Assemblage photos robe.jpg', 'Price'=>0, 'Category'=>'Couture'],
    ['Title'=>'La Lorelei en cuir', 'Description'=>'Image numérique', 'Size'=>'300dpi', 'Image'=>'Le-Bateau-optimised.jpg', 'Price'=>0, 'Category'=>'Infographie'],
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
      $creation->setCategories(($this->getReference($one_creation['Category'])));

      $manager->persist($creation);
    }
    $manager->flush();
  }
}