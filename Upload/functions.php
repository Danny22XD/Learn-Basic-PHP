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

//function untuk upload gambar
function upload() {
   //tangkap data-data dari gambar pada variable $_FILES
   $namaFile = $_FILES['gambar']['name'];
   $ukuranFile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];
   $tmpName = $_FILES['gambar']['tmp_name'];

   //cek gambar diupload atau tidak.
   if($error === 4) {
      echo "
      <script>
         alert('gambar belum dipilih');
      </script>
      ";
      return false;
   }

   //cek ekstensi file yang diupload valid atau tidak.
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.', $namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));

   if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "
      <script>
         alert('gambar tidak valid');
      </script>
      ";
   }

   //jika gambar terlalu besar
   if($ukuranFile > 100000) {
      echo "
      <script>
         alert('gambar terlalu besar');
      </script>
      ";
   }

   //jika lolos pengecekan diatas
   //pada nama file yang diupload ke database harus uniq/tidak boleh sama. maka kita generate nama file uniq
   $namaFileBaru = uniqid();
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiGambar;
   move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

   return $namaFileBaru;
}

//function query data pada form untuk dikirimkan ke dalam database
function create($data) {
   global $db;
   //ambil data pada tiap-tiap elemen form
   //upload gambar
   $gambar = upload();
   if(!$gambar) {
      return false;
   }
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
   //data untuk gambar lama
   $gambarLama = htmlspecialchars($data["gambarLama"]);
   //cek apakah user meng-upload gamabr lama atau tidak
   if($_FILES['gambar']['error'] === 4) {
      $gambar = $gambarLama;
   } else {
      $gambar = upload();
   }

   $judul = htmlspecialchars($data["judul"]);
   $pengarang = htmlspecialchars($data["pengarang"]);
   $tahunterbit = htmlspecialchars($data["tahunterbit"]);

   $query = "UPDATE listBuku SET gambar = '$gambar', judul_buku = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahunterbit' WHERE id = $id";

   mysqli_query($db, $query);

   return mysqli_affected_rows($db);
}

function searching($keyword) {
   $query = "SELECT * FROM listBuku WHERE judul_buku LIKE '%$keyword%' OR pengarang LIKE '%$keyword%' OR tahun_terbit LIKE '%$keyword%'";

   return query($query);
}

?>