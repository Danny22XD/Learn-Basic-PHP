<?php 
//connect ke database
$db = mysqli_connect("localhost", "root", "", "latihanPhp");

//ambil database atau query database
$result = mysqli_query($db, "SELECT * FROM listBuku");

//fetch (ambil) data dari database
//$datas = mysqli_fetch_assoc($result);
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
      <?php while($datas = mysqli_fetch_assoc($result)) : ?>
      <tr>
         <td><?= $nomor; ?></td>
         <td>
            <a href="">Edit</a> |
            <a href="">Delete</a>
         </td>
         <td><img src="img/<?= $datas["gambar"] ?>" width="50"></td>
         <td><?= $datas["judul_buku"] ?></td>
         <td><?= $datas["pengarang"] ?></td>
         <td><?= $datas["tahun_terbit"] ?></td>
      </tr>
      <?php $nomor++; ?>
      <?php endwhile; ?>
   </table>
</body>
</html>