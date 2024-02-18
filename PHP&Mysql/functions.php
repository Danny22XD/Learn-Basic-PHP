<?php 
//connect ke database
$db = mysqli_connect("localhost", "root", "", "latihanPhp");

//function untuk query database
function query($query){
   global $db;
   $result = mysqli_query($db, $query);
   $datas = [];
   while($data = mysqli_fetch_assoc($result)) {
      $datas[] = $data;
   }
   return $datas;
}

?>