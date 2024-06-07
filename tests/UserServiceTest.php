<?php

use PHPUnit\Framework\TestCase;
use App\Application\UserService;
use Doctrine\ORM\EntityManager;
use App\Domain\User;

class UserServiceTest extends TestCase
{
    private EntityManager $entityManager;
    private UserService $userService;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManager::class);
        $this->userService = new UserService($this->entityManager);
    }

    public function testCreateUser(): void
    {
        $user = $this->userService->createUser('John Doe');
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->getName());
    }
}
