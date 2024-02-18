<?php 
//require untuk connect database
require 'functions.php';

//query database untuk menampilkan data ke user interface
$datas = query("SELECT * FROM listBuku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Latihan PHP & Mysql</title>
</head>
<body>
   <h1>Daftar Buku</h1>
   <a href="create.php">Tambah Data Buku</a>
   <br><br>
   <table border="1" cellpadding="10" cellspacing="0">
      <tr>
         <th>No</th>
         <th>Aksi</th>
         <th>Gambar</th>
         <th>Judul Buku</th>
         <th>Pengarang</th>
         <th>Tahun Terbit</th>
      </tr>
      <?php $nomor = 1; ?>
      <?php foreach($datas as $data) : ?>
      <tr>
         <td><?= $nomor; ?></td>
         <td>
            <a href="edit.php?id=<?= $data["id"] ?>">Edit</a> |
            <a href="delete.php?id=<?= $data["id"] ?> " onclick="return confirm('yakin?');">Delete</a>
         </td>
         <td><img src="img/<?= $data["gambar"] ?>" width="50"></td>
         <td><?= $data["judul_buku"] ?></td>
         <td><?= $data["pengarang"] ?></td>
         <td><?= $data["tahun_terbit"] ?></td>
      </tr>
      <?php $nomor++; ?>
      <?php endforeach; ?>
   </table>
</body>
</html>