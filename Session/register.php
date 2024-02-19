<?php
require 'functions.php';

if (isset($_POST["register"])) {

   if (register($_POST) > 0) {
      echo "
         <script>
            alert('Data berhasil Ditambahkan');
         </script>
      ";
      header("Location: login.php");
      exit;
   } else {
      echo mysqli_error($db);
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrasi</title>
   <style>
      label {
         display: block;
      }

      button {
         margin-top: 5px;
      }
   </style>
</head>

<body>
   <h1>Halaman Registrasi</h1>

   <form action="" method="post">
      <ul>
         <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" autocomplete="off">
         </li>
         <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" autocomplete="off">
         </li>
         <li>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
         </li>
         <li>
            <label for="password2">Konfirmasi Password</label>
            <input type="password" name="password2" id="password2">
         </li>
         <li>
            <button type="submit" name="register">Register</button>
         </li>
      </ul>
   </form>
   <p>Sudah memiliki akun?</p>
   <a style="text-decoration: none;" href="login.php">Login</a>
</body>

</html>