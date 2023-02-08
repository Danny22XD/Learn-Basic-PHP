<?php 
   //Pengkodisian atau Percabangan ---> (if(), if()...else(), if()...elseif()...else(), ternary(), switch())

   //if
   $totBelanja = 15000;
   if($totBelanja > 10000){
      echo "anda mendapatkan kupon";
   }
   echo "<br><br>";

echo "<hr>";

   //if else
   $umur = 13;
   if($umur < 18){
      echo "kamu tidak boleh naik motor";
   } else{
      echo "kamu boleh naik motor";
   }
   echo "<br><br>";

echo "<hr>";

//if elseif else
$nilai = 50;

if ($nilai > 90) {
   echo "A+";
} elseif ($nilai > 80) {
   echo "A";
} elseif ($nilai > 70) {
   echo "B+";
} elseif ($nilai > 60) {
   echo "B";
} elseif ($nilai > 50) {
   echo "C+";
} elseif ($nilai > 40) {
   echo "C";
} elseif ($nilai > 30) {
   echo "D";
} elseif ($nilai > 20) {
   echo "E";
} else {
   echo "F";
}
?>