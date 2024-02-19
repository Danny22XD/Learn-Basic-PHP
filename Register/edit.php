<?php 
require 'functions.php';

//ambil id sebagai index untuk memilih sebuah data
$id = $_GET["id"];

//query data yang sudah dipilih yang menggunakan id tadi
$dataBuku = query("SELECT * FROM listBuku WHERE id = $id")[0];


if(isset($_POST["submit"])){
   
   if (edit($_POST) > 0) {
      echo "
      <script>
         alert('Data Berhasil Diubah');
         document.location.href = 'index.php';
      </script>";
   } else {
      echo "
      <script>
         alert('Gagal Mengubah Data');
         document.location.href = 'index.php';
      </script>";
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ubah Data</title>
</head>
<body>
   <h1>Ubah Data Buku</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $dataBuku["id"] ?>">
      <input type="hidden" name="gambarLama" value="<?= $dataBuku["gambar"] ?>">
      <ul>
         <li>
            <label for="gambar">Gambar :</label>
            <input type="file" name="gambar" id="gambar">
         </li>

         <li>
            <label for="Judul">Judul Buku :</label>
            <input type="text" name="judul" id="judul" required value="<?= $dataBuku["judul_buku"]; ?>">
         </li>

         <li>
            <label for="pengarang">Pengarang :</label>
            <input type="text" name="pengarang" id="pengarang" required value="<?= $dataBuku["pengarang"]; ?>">
         </li>

         <li>
            <label for="tahunterbit">Tahun Terbit :</label>
            <input type="text" name="tahunterbit" id="tahunterbit" required value="<?= $dataBuku["tahun_terbit"]; ?>">
         </li>

         <li>
            <button type="submit" name="submit">Ubah Data</button>
         </li>
      </ul>
   </form>
</body>
</html>