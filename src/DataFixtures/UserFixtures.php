<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
  private UserPasswordHasherInterface $passwordHasher;

  public function __construct(UserPasswordHasherInterface $passwordHasher)
  {
      $this->passwordHasher = $passwordHasher;
  }
    public function load(ObjectManager $manager)
    {
      $admin = new User();
      $admin->setRoles(['ROLE_USER','ROLE_ADMIN']);
      $admin->setEmail('ljacobieski@gmail.com');
      $hashedPassword = $this->passwordHasher->hashPassword(
          $admin,
          'admin'
      );
      $admin->setPassword($hashedPassword);
      $manager->persist($admin);
      $manager->flush();
    }
}