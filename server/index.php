<?php
$json = file_get_contents('./file.json');
$data = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Домашнее задание 4</title>
</head>
<body>
  <table border = '1'>
  <?php
  echo "<tr><th rowspan = '2'>Имя</th><th rowspan = '2'>Фамилия</th><th colspan = '3'>Адрес</th><th rowspan = '2'>Телефон</th></tr>";
  echo "<tr><th>Страна</th><th>Город</th><th>Улица</th></tr>";
  foreach($data as $row) {
    $span = count($row['phoneNumber']);
    echo "<tr><td rowspan = " . $span . ">" . $row['firstName'] . "</td><td rowspan = " . $span . ">" . $row['lastName'] . "</td><td rowspan = " . $span . ">" . $row['address']['country'] . "</td><td rowspan = " . $span . ">" . $row['address']['city'] . "</td><td rowspan = " . $span . ">" . $row['address']['street'] . "</td><td>" . $row['phoneNumber'][0]. "</td></tr>";
    for ($i = 1; $i < $span; $i++) {
      echo "<tr><td>" . $row['phoneNumber'][$i] . "</td></tr>";
    }
  }
  ?>
  </table>
</body>
</html>