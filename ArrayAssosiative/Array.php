<?php 

$mahasiswa = [
   ["nama" => "danny suseno", "nim" => "19103041064", "jurusan" => "teknik informatika", "email" => "demo@demo.com"],
   ["nama" => "agus", "nim" => "28937779173", "jurusan" => "rerjere", "email" => "demo@demo.ac.id"]
]

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Latihan Array Assosiative</title>
</head>
<body>
   <h1>Daftar Mahasiswa</h1>
   <?php foreach($mahasiswa as $mhs) : ?>
   <ul>
      <li>Nama : <?= $mhs["nama"]; ?></li>
      <li>Nama : <?= $mhs["nim"]; ?></li>
      <li>Nama : <?= $mhs["jurusan"]; ?></li>
      <li>Nama : <?= $mhs["email"]; ?></li>
   </ul>
   <?php endforeach; ?>
</body>
</html>