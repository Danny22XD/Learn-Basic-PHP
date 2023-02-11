<?php 

//create simple function
function writeMsg(){
   return "Mau bakwan?";
}
echo writeMsg();

echo "<hr>";

//create function with argument
function familyName($fname){
   return "$fname Suseno.<br>";
}
echo familyName("Danny");
echo familyName("Ririn");
echo familyName("Jun jun");

echo "<hr>";

//create function with 2 argument
function family($fname, $year){
   return "$fname Suseno, born at Jeketro in $year";
}
echo family("Danny", "1999");

echo "<hr>";

//create function mathematic
function multiply($x, $y){
   return $x*$y;
}
echo "5 * 3 = ".multiply(5, 3);

echo"<hr>";

//create function with default value
function setHight(int $minhight = 50){
   return "the hight is : $minhight <br>";
}
echo setHight(433);
echo setHight(3432);
echo sethight();

echo "<hr>";

//create function returning variable values
function sum($x, $y){
   $z = $x + $y;
   return $z;
}

echo "5 + 4 = ".sum(5,4);

echo "<hr>";

//create function by pass reference
function addFive(&$value){
   $value += 3;
}

$num = 4;
addFive($num);
echo $num;
?>
