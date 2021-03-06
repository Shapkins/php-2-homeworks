<?php

$uploaddir = './tests/';
$tests = array_slice(scandir($uploaddir), 2);
$testFilePath = $uploaddir . $tests[$_GET['file'] - 1];
$json = file_get_contents($testFilePath);
$data = json_decode($json, true);
$question = 0;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Страница с тестом</title>
</head>
<body>
  <form action="" method="POST">
    <?php
    foreach($data as $task) {
      $question++;
      echo '<fieldset>';
      echo '<legend>' . $task['question'] . '</legend>';
      $answer = 0;
      foreach($task['answer'] as $variant) {
        $answer++;
        echo '<label><input type="radio" name="q' . $question . '" value="' . $variant . '">' . $variant . '</label>';
      }
      echo '</fieldset>';
    }

    ?>
    <input type="submit" value="Отправить">  
  </form>
</body>
</html>

<?php

if (!(empty($_POST))) {
  $points = 0;
  $question = 0;
  foreach($data as $task) {
    $question++;
    $id = 'q' . $question;
    if ($task['correct'] == $_POST[$id]) {
      $points++;
    }
  }
  echo 'Верных ответов: ' . $points;
}
?>