<?php
require_once __DIR__ . '/vendor/autoload.php';

$data = new \Tugas\Dac\Entity\Nilai();
$nilai = new \Tugas\Dac\Repository\NilaiRepository(\Tugas\Dac\Config\Database::getConnection());
$result = $nilai->findById($_GET['nim']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--edit page-->

<h3>UTS Pemrograman Web 2022/2023</h3>
<form action="" method="post">
    Nim : <?= $result->getNim() ?>
    <br>
    Edit NIM :
    <input type="text" name="newNim" id="">
    <br>
    Nama :
    <input type="text" name="nama" id="" value="<?= $result->getNama() ?>">
    <br>
    Presensi :
    <input type="number" name="presensi" id="" value="<?= $result->getPresensi() ?>">
    <br>
    Tugas :
    <input type="number" name="tugas" id="" value="<?= $result->getTugas() ?>">
    <br>
    Uts :
    <input type="number" name="uts" id="" value="<?= $result->getUts() ?>">
    <br>
    Uas :
    <input type="text" name="uas" id="" value="<?= $result->getUas() ?>">
    <br>
    <button type="submit" name="submit">edit</button>
    <?php
    if (isset($_POST['submit']))
    {
        $data->newNim = $_POST['newNim'];
        $data->setNim($_GET['nim']);
        $data->setNama($_POST['nama']);
        $data->setPresensi($_POST['presensi']);
        $data->setTugas($_POST['tugas']);
        $data->setUts($_POST['uts']);
        $data->setUas($_POST['uas']);
        $nilai->update($data);
        echo "<script>alert('Data berhasil di edit'); window.location.href='pweb.php'</script>";
    }
    ?>
</form>
</body>
</html>