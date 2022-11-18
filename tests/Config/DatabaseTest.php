<?php

namespace Tugas\Dac\Config;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testConnection()
    {
        $connection = Database::getConnection();
        self::assertNotNull($connection);
    }
}
