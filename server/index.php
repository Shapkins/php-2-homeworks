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
  echo "<tr><th>Имя</th><th>Фамилия</th><th>Адрес</th><th>Телефон</th></tr>";
  for ($i = 0; $i < count($data); $i++) {
    echo "<tr><td>" . $data[$i]['firstName'] . "</td><td>" . $data[$i]['lastName'] . "</td><td>" . $data[$i]['address'] . "</td><td>" . $data[$i]['phoneNumber']. "</td></tr>";
  }
  ?>
  </table>
</body>
</html>