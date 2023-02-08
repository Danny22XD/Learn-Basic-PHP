<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Latihan Looping</title>
</head>

<body>
   <!-- Table dengan pure html -->
   <table border="1" cellpadding="10" cellspacing="0">
      <tr>
         <td>1,1</td>
         <td>1,2</td>
         <td>1,3</td>
         <td>1,4</td>
      </tr>
      <tr>
         <td>2,1</td>
         <td>2,2</td>
         <td>2,3</td>
         <td>2,4</td>
      </tr>
   </table>
<hr>
   <!-- Table dengan Looping -->
   <table border="1" cellpadding="10" cellspacing="0">
      <?php

         for($i = 1; $i <= 2; $i++){
            echo "<tr>";
               for ($j = 1; $j <= 4 ; $j++) { 
                  echo "<td>$i,$j</td>";
               }
            echo "</tr>";
         }

      ?>
   </table>
<hr>
   <!-- Dengan Gaya Templating -->
   <table border="1" cellpadding="10" cellspacing="0">
      <?php for($i = 1; $i <= 2; $i++) : ?>
         <tr>
            <?php for($j = 1; $j <= 4; $j++) : ?>
               <td><?php echo "$i,$j"; ?></td>
            <?php endfor; ?>
         </tr>
      <?php endfor; ?>
   </table>
</body>

</html>