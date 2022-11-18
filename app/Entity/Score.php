<?php

namespace Tugas\Dac\Entity;

class Score
{
    private string $id;
    private string $user_id;
    private int $score_total;
    private string $time_spent;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getScoreTotal(): int
    {
        return $this->score_total;
    }

    /**
     * @param int $score_total
     */
    public function setScoreTotal(int $score_total): void
    {
        $this->score_total = $score_total;
    }

    /**
     * @return string
     */
    public function getTimeSpent(): string
    {
        return $this->time_spent;
    }

    /**
     * @param string $time_spent
     */
    public function setTimeSpent(string $time_spent): void
    {
        $this->time_spent = $time_spent;
    }

}