<?php

$connect = new PDO("mysql:host=localhost;dbname=global;charset=UTF8", "sshapkin", "neto1790");

$sql = 'SELECT * FROM books';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Задание 4.1</title>
</head>
<body>
  <table border='1'>
  <?php foreach ($connect->query($sql) as $row){
    echo "<tr><td>".$row['name']."</td><td>".$row['author']."</td><td>".$row['year']."</td></tr>";
  } ?>
  </table>
</body>
</html>