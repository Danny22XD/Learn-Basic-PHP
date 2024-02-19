<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
   header("Location: login.php");
   exit;
}

//require untuk connect database
require 'functions.php';

//query database untuk menampilkan data ke user interface
$datas = query("SELECT * FROM listBuku");

if(isset($_POST["searching"])){
   $datas = searching($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Latihan PHP & Mysql</title>
   <style>
      a {
         text-decoration : none;
      }
   </style>
</head>
<body>
   <h1>Daftar Buku</h1>
   <a href="create.php">Tambah Data Buku</a>
   <a href="logout.php">Logout</a>
   <br><br>

   <form action="" method="post">
      <input type="text" name="keyword" size="52" placeholder="masukkan kata kunci yang ingin dicari" autocomplete="off">
      <button type="submit" name="searching">Cari</button>
   </form>
   <br>
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