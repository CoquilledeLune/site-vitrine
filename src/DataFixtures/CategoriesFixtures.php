<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    const CATEGORIES = [
            'Peinture',
            'Couture',
            'Infographie',
            'Ecriture',
          ];
    

    public function load(ObjectManager $manager)

    {
    foreach (self::CATEGORIES as $key => $categoryName) {  

        $category = new Categories;  
        $category->setName($categoryName);  
        
        $manager->persist($category); 
        $this->addReference($categoryName, $category);
    }
    $manager->flush();
    }
}
