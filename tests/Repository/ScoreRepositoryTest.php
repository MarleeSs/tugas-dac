<?php

namespace Tugas\Dac\Repository;

use PHPUnit\Framework\TestCase;
use Tugas\Dac\Config\Database;
use Tugas\Dac\Entity\Score;
use Tugas\Dac\Entity\User;

class ScoreRepositoryTest extends TestCase
{
    private ScoreRepository $repository;
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        $this->repository = new ScoreRepository(Database::getConnection());
        $this->userRepository = new UserRepository(Database::getConnection());
//        $this->userRepository->deleteAll();
    }

    public function testRender()
    {

        foreach ($this->userRepository->scoreJoinUser() as $key => $value) {
            $result = $value->getName() . " " . $value->getScore() . " " . $value->getSpent();
            var_dump($result);
            self::assertNotNull($result);
        }
    }
}
