<?php

namespace Tugas\Dac\Repository;

use Tugas\Dac\Entity\ScoreJoin;
use Tugas\Dac\Entity\User;
use Tugas\Dac\Service\MergeSort;

class UserRepository
{
    private \PDO $connection;

    /**
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): User
    {
        $stmt = $this->connection->prepare("INSERT INTO users(id, name) VALUES (?, ?)");
        $stmt->execute([$user->getId(), $user->getName()]);
        return $user;
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM users");
    }

    public function scoreJoinUser(): array
    {
        $sql = "SELECT user.name, score.score_total, score.time_spent
FROM scores score
         INNER JOIN users user ON user.id = score.user_id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $dataAll = $stmt->fetchAll();

        $result = [];
        foreach ($dataAll as $row) {
            $data = new ScoreJoin();
            $data->setName($row['name']);
            $data->setScore($row['score_total']);
            $data->setSpent($row['time_spent']);

            $result[] = $data;
        }

        $sort = new MergeSort();
        return $sort->mergeSort($result);
    }
}