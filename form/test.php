<?php

$uploaddir = './tests/';
$tests = array_slice(scandir($uploaddir), 2);
$testFilePath = $uploaddir . $tests[$_GET['file'] - 1];
$json = file_get_contents($testFilePath);
$data = json_decode($json, true);
$correctAnswers = [];
$question = 0;
foreach($data as $task) {
  $question++;
  $correct = $task['correct'] . 'of' . $question;
  array_push($correctAnswers, $correct);
}
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
        echo '<label><input type="radio" name="' . $answer . 'of' . $question . '">' . $variant . '</label>';
      }
      echo '</fieldset>';
    }

    ?>
    <input type="submit" value="Отправить">  
  </form>
</body>
</html>

<?php
if (!empty($_POST)) {
  $question = 0;
  $points = 0;
  foreach($data as $task) {
    $question++;
    $correct = $task['correct'] . 'of' . $question;
    if (!empty($_POST[$correct])) {
      $points++;
    }
  }
  echo 'Верных ответов: ' . $points;
}
?>