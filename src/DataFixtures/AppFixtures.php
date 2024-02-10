<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class AppFixtures extends Fixture
{

    public function __construct(private PasswordHasherFactoryInterface $passwordHasherFactory) {}

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 0; $i < 50; $i++) {
            $book = new Book();
            $book->setTitle("Livre " . $i);
            $book->setAuthor("Auteur " . $i);
            $book->setGenre("Genre " . $i);
            $book->setQuantity($i);
            $manager->persist($book);
        }

        $user = new User();
        $user->setUsername("username");
        $user->setPassword("password");
        $user->setRole("[ROLE_USER]");
        $manager->persist($user);

        $manager->flush();
    }
}
