<?php 
require 'functions.php';
if(isset($_POST["submit"])){

   if (create($_POST) > 0) {
      echo "
      <script>
         alert('Data Berhasil Ditambahkan');
         document.location.href = 'index.php';
      </script>";
   } else {
      echo "
      <script>
         alert('Gagal Menambahkan Data');
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
   <title>Create Data</title>
</head>
<body>
   <h1>Tambah Data Buku</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <ul>
         <li>
            <label for="gambar">Gambar :</label>
            <input type="file" name="gambar" id="gambar">
         </li>

         <li>
            <label for="Judul">Judul Buku :</label>
            <input type="text" name="judul" id="judul" required>
         </li>

         <li>
            <label for="pengarang">Pengarang :</label>
            <input type="text" name="pengarang" id="pengarang" required>
         </li>

         <li>
            <label for="tahunterbit">Tahun Terbit :</label>
            <input type="text" name="tahunterbit" id="tahunterbit" required>
         </li>

         <li>
            <button type="submit" name="submit">Tambahkan Data</button>
         </li>
      </ul>
   </form>
</body>
</html>