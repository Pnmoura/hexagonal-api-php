<?php

namespace App\Application;

use Doctrine\ORM\EntityManager;
use App\Domain\User;

class UserService
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllUsers(): array
    {
        return $this->entityManager->getRepository(User::class)->findAll();
    }

    public function createUser(string $name): User
    {
        $user = new User($name);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }
}
