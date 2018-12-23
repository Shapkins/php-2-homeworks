<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Список тестов</title>
</head>
<body>
  <ul>
  <?php
  $number = 0;
  $uploaddir = './tests/';
  $tests = array_slice(scandir($uploaddir), 2);
  foreach ($tests as $test) {
    $number++;
    echo '<li><a href = "test.php?file=' . $number . '">' . $test . '</a></li>';
  }
  ?>
  </ul>
</body>
</html>