<?php

namespace Tugas\Dac\Repository;

use PHPUnit\Framework\TestCase;
use Tugas\Dac\Config\Database;
use Tugas\Dac\Entity\User;

class UserRepositoryTest extends TestCase
{
    private UserRepository $repository;

    protected function setUp(): void
    {
        $this->repository = new UserRepository(Database::getConnection());

        $this->repository->deleteAll();
    }

    public function testSave()
    {
        $user = new User();
        $user->setId(uniqid());
        $user->setName('Marleess');

        $result = $this->repository->save($user);
        self::assertNotNull($result);
    }
}
