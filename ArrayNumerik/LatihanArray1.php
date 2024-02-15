<?php 
$students = [
   ["Agus", "30323234243", "Pertanian", "demo@demo.com"],
   ["budi", "89597457545", "Kriminologi", "demo@demo.com"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Latihan</title>
</head>
<body>
   <h1>Daftar Mahasiswa</h1>
   <?php foreach ($students as $student) : ?>
<ul>
   <li>Nama : <?= $student[0] ?></li>
   <li>Nama : <?= $student[1] ?></li>
   <li>Nama : <?= $student[2] ?></li>
   <li>Nama : <?= $student[3] ?></li>
</ul>
   <?php endforeach ?>
</body>
</html>
