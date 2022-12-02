<?php
require_once __DIR__ . '/vendor/autoload.php';

$data = new \Tugas\Dac\Entity\Nilai();
$nilai = new \Tugas\Dac\Repository\NilaiRepository(\Tugas\Dac\Config\Database::getConnection());

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
<h3>UTS Pemrograman Web 2022/2023</h3>
<form action="" method="post">
    Nama :
    <input type="text" name="nama" id="">
    <br>
    NIM :
    <input type="text" name="nim" id="">
    <br>
    Presensi :
    <input type="number" name="presensi" id=""> 10 %
    <br>
    Tugas :
    <input type="number" name="tugas" id=""> 25 %
    <br>
    UTS :
    <input type="number" name="uts" id=""> 30 %
    <br>
    UAS :
    <input type="number" name="uas" id=""> 35 %
    <br>
    <button type="submit" name="submit">proses</button>
</form>
<?php 
if (isset($_POST['submit']))
{
    $data->setNim($_POST['nim']);
    $data->setNama($_POST['nama']);
    $data->setPresensi($_POST['presensi']);
    $data->setTugas($_POST['tugas']);
    $data->setUts($_POST['uts']);
    $data->setUas($_POST['uas']);
    $nilai->save($data);
    echo "<script>alert('Data berhasil di edit'); window.location.href='pweb.php'</script>";
}
?>
<br>
<i>Hasil dari Form handling</i>
<h3>UTS Pemrograman Web 2022/2023</h3>
    <table border="1">
        <tr>
            <td>NIM</td>
            <td>Nama</td>
            <td>Presensi</td>
            <td>Tugas</td>
            <td>UTS</td>
            <td>UAS</td>
            <td>Nilai</td>
            <td>Action</td>
        </tr>
<?php foreach ($nilai->findAll() as $key => $value) :?>
        <tr>
            <td><?= $value->getNim() ?></td>
            <td><?= $value->getNama() ?></td>
            <td><?= $value->getPresensi() ?></td>
            <td><?= $value->getTugas() ?></td>
            <td><?= $value->getUts() ?></td>
            <td><?= $value->getUas() ?></td>
            <td><?= ($value->getPresensi() * 10 / 100) + ($value->getTugas() * 25 / 100) + ($value->getUts() * 30 / 100) + ($value->getUas() * 35 / 100)?></td>
            <td>
                <a href="edit.php?nim=<?= $value->getNim() ?>">Edit</a>
            </td>
        </tr>
<?php endforeach; ?>
    </table>
</body>
</html>