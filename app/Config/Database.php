<?php

namespace Tugas\Dac\Config;

use PDO;

class Database
{
    private static ?PDO $PDO = null;

    public static function getConnection(): PDO
    {
        if (self::$PDO == null){
            self::$PDO = new PDO(
                'mysql:host=localhost;dbname=tugas_dac',
                'root',
                'marleess771'
            );
        }
        return self::$PDO;
    }
}