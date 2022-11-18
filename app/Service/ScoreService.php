<?php

namespace Tugas\Dac\Service;

use Tugas\Dac\Repository\UserRepository;

class ScoreService
{
    public function nameSplitter(string $name): string
    {
        $nameSlice = explode(' ', $name);
        $nameSlice = array_filter($nameSlice);
        $initials = (isset($nameSlice[0][0])) ? strtoupper($nameSlice[0][0]) : '';
        $initials .= (isset($nameSlice[count($nameSlice) - 1][0])) ? strtoupper($nameSlice[count($nameSlice) - 1][0]): '';

        return $initials;
    }
}