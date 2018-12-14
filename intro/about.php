<?php 
  $name = "Станислав";
  $age = 28;
  $city = 'Мытищи';
  $email = 'shapkin359@gmail.com';
  $aboutMe = 'Какой-то непритязательный текст о себе';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Страница пользователя <?= $name ?></title>
</head>
<body>
  <h1>Страница пользователя <?= $name ?></h1>
  
  <p><b>Имя пользователя:</b> <?= $name ?></p>
  <p><b>Возраст:</b> <?= $age ?> лет</p>
  <p><b>Город проживания:</b> <?= $city ?></p>
  <p><b>Контактный e-mail:</b> <?= $email ?></p>
  <p><b>О пользователе <?= $name ?></b>: <?= $aboutMe ?></p>
  
  <p>А алгоритм он вот так работает:</p>
  <?php
  $x = $_GET['x'];
  $firstParam = 1;
  $secondParam = 1;
  while ($firstParam <= $x) {
    if ($firstParam != $x) {
      $anotherParam = $firstParam;
      $firstParam += $secondParam;
      $secondParam = $anotherParam;
    } else {
      echo 'Задуманное число входит в числовой ряд';
      break;
    }
  }
  if ($firstParam > $x) {
    echo 'Задуманное число НЕ входит в числовой ряд';
  }
  ?>
  <p>Числовой ряд - это последовательность Фибоначчи</p>
</body>
</html>