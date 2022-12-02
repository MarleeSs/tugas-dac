<?php

namespace Tugas\Dac\Repository;

use Tugas\Dac\Entity\Nilai;

class NilaiRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Nilai $nilai): Nilai
    {
        $statement = $this->connection
            ->prepare("INSERT INTO pweb(nim, name, presensi, tugas, uts, uas) VALUES (?,?,?,?,?,?)");
        $statement->execute([$nilai->getNim(), $nilai->getNama(), $nilai->getPresensi(), $nilai->getTugas(), $nilai->getUts(), $nilai->getUas()]);
        return $nilai;
    }

    public function update(Nilai $nilai): Nilai
    {
        if ($nilai->newNim !== null) {
            $statement = $this->connection
                ->prepare("UPDATE pweb SET nim = ? WHERE nim = ?");
            $statement->execute([$nilai->newNim, $nilai->getNim()]);
            return $nilai;
        } else {
            $statement = $this->connection
                ->prepare("UPDATE pweb SET name = ?, presensi = ?, uts = ?, uas = ? WHERE nim = ?");
            $statement->execute([$nilai->getNama(), $nilai->getPresensi(), $nilai->getUts(), $nilai->getUas(), $nilai->getNim()]);
            return $nilai;
        }
    }

    public function findById(string $id): ?Nilai
    {
        $statement = $this->connection
            ->prepare("SELECT nim, name, presensi, tugas, uts, uas FROM pweb WHERE nim = ? ");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $nilai = new Nilai();
                $nilai->setNim($row['nim']);
                $nilai->setNama($row['name']);
                $nilai->setPresensi($row['presensi']);
                $nilai->setTugas($row['tugas']);
                $nilai->setUts($row['uts']);
                $nilai->setUas($row['uas']);

                return $nilai;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findAll(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM pweb");
        $statement->execute();

        $result = [];

        $nilais = $statement->fetchAll();

        foreach ($nilais as $row) {
            $nilai = new Nilai();
            $nilai->setNim($row['nim']);
            $nilai->setNama($row['name']);
            $nilai->setPresensi($row['presensi']);
            $nilai->setTugas($row['tugas']);
            $nilai->setUts($row['uts']);
            $nilai->setUas($row['uas']);

            $result[] = $nilai;
        }
        return $result;
    }
}