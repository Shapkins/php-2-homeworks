<?php

$number = 0;
$uploaddir = './tests/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$tests = array_slice(scandir($uploaddir), 2);
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "Файл корректен и был успешно загружен.\n";
} else {
  echo "Возможная атака с помощью файловой загрузки!\n";
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Список тестов</title>
</head>
<body>
  <ul>
  <?php
  foreach ($tests as $test) {
    $number++;
    echo '<li><a href = "test.php?file=' . $number . '">' . $test . '</a></li>';
  }
  ?>
  </ul>
</body>
</html>