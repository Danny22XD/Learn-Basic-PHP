<?php 
session_start();

if( isset($_SESSION["login"]) ) {
   header("Location: index.php");
   exit;
}

require 'functions.php';

if(isset($_POST["login"])){
   //tangkap data untuk inputan dari user dan masukkan kedalam variable
   $email = $_POST["email"];
   $password = $_POST["password"];

   //cek apakah ada username tertentu yang ada pada database
   $query = "SELECT * FROM user WHERE email = '$email'";
   $result = mysqli_query($db, $query);

   //cek user yang diinputkan sudah terdaftar atau belum
   if(mysqli_num_rows($result) === 1) { //mysqli_num_rows($var)---> menghasilkan nilai 1 untuk true dan 0 untuk false.

      //cek password dengan function password_verify(string $password, string $hash)
      //ambil data user sesuai email yang diinputkan tadi, caranya...
      $dataUser = mysqli_fetch_assoc($result); //---> function disamping untuk mendapatkan data dari tiap2 field pada email yang dipilih saat memasukkan email pada form.

      //cek password
      if(password_verify($password, $dataUser["password"])) {

         //cek $session sudah ada apa belum
         $_SESSION["login"] = true;
         //jika session sudah ada baru redirect ke halaman index.php
         header("Location: index.php");
         exit;
      }

   }

   $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Login</title>
   <style>
      label {
         display : block;
      }
      button {
         margin-top: 5px;;
      }
   </style>
</head>
<body>
   <h1>Halaman Login</h1>
   <?php if(isset($error)) : ?>
      <p style="color: red; font-style:italic;">Email atau Password salah</p>
   <?php endif; ?>
   <form action="" method="post">
      <ul>
         <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" autocomplete="off" placeholder="Masukkan Email">
         </li>

         <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" autocomplete="off" placeholder="Masukkan Password">
         </li>

         <li>
            <button type="submit" name="login">Login</button>
         </li>
      </ul>
   </form>
   <p>Belum memiliki akun?</p>
   <a style="text-decoration: none;" href="register.php">Register</a>
</body>
</html>