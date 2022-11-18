<?php

namespace Tugas\Dac\Repository;

use Tugas\Dac\Entity\Score;

class ScoreRepository
{
    private \PDO $connection;

    /**
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Score $score): Score
    {
        $stmt = $this->connection->prepare("INSERT INTO scores(id, user_id, score_total, time_spent) VALUES (?, ?, ?, ?)");
        $stmt->execute([$score->getId(), $score->getUserId(), $score->getScoreTotal(), $score->getTimeSpent()]);
        return $score;
    }
}