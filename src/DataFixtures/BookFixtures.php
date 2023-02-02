<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
  const BOOKS = [
    ['Title'=>'Banagul et les Couleurs', 'Image'=>'couvertureBangulOptimised.png', 'Link'=>'https://www.amazon.fr/Banagul-Couleurs-Lila-Jacobieski/dp/295003084X/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=1675354872&sr=8-1'], 
    ['Title'=>'Feuilles d\'âme', 'Image'=>'couvertureFeuillesDameOptimised.jpg', 'Link'=>'https://www.amazon.fr/Feuilles-d%C3%A2me-St%C3%A9phanie-Jacobieski/dp/2746695804/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=1675354913&sr=8-1'], 
  ];

  public function load(ObjectManager $manager): void
  {
    foreach (self::BOOKS as $key => $one_book) 
    {
      $book = new Book();
      $book->setTitle($one_book['Title']);
      $book->setImage($one_book['Image']);
      $book->setLink($one_book['Link']);

      $manager->persist($book);
    }
    $manager->flush();
  }
}