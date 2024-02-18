<?php 
//function untuk connect ke database
$db = mysqli_connect("localhost", "root", "", "latihanPhp");

//function untuk query database
function query($query) {
   global $db;
   $result = mysqli_query($db, $query);
   $datas = [];
   while($data = mysqli_fetch_assoc($result)) {
      $datas[] = $data;
   }
   return $datas;
}

//function query data pada form untuk dikirimkan ke dalam database
function create($data) {
   global $db;
   //ambil data pada tiap-tiap elemen form
   $gambar = htmlspecialchars($data["gambar"]);
   $judul = htmlspecialchars($data["judul"]);
   $pengarang = htmlspecialchars($data["pengarang"]);
   $tahunterbit = htmlspecialchars($data["tahunterbit"]);

   $query = "INSERT INTO listBuku VALUES ('', '$gambar', '$judul', '$pengarang', '$tahunterbit')";
   mysqli_query($db, $query);

   return mysqli_affected_rows($db);
}

//function tombol untuk menghapus data
function delete($id) {
   global $db;
   $query = "DELETE FROM listBuku WHERE id = $id";
   mysqli_query($db, $query);

   return mysqli_affected_rows($db);
}

//function untuk melakukan ubah data
function edit($data) {
   global $db;
   $id = $data["id"];
   $gambar = htmlspecialchars($data["gambar"]);
   $judul = htmlspecialchars($data["judul"]);
   $pengarang = htmlspecialchars($data["pengarang"]);
   $tahunterbit = htmlspecialchars($data["tahunterbit"]);

   $query = "UPDATE listBuku SET gambar = '$gambar', judul_buku = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahunterbit' WHERE id = $id";

   mysqli_query($db, $query);

   return mysqli_affected_rows($db);
}

?>