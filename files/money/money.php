<?php

$sum = 0;
$handle = fopen('money.csv', 'r');

if (count($argv) == 1) {
  echo 'Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}';
} else {
  if (implode (' ', array_slice($argv, 1)) == '--today') {
    do {
      $data = fgetcsv($handle, 1000, ',');
      if ($data[0] === date('Y-m-d')) {
        $sum += $data[1];
      }
    } while ($data[0] !== NULL);
    echo date('Y-m-d') . ' расход за день: ' . $sum;
  } else {
    fclose($handle);
    $handle = fopen('money.csv', 'a');
    $recordString = implode (',', array(date('Y-m-d'), $argv[1], implode (' ', array_slice($argv, 2))));
    fputcsv($handle, array($recordString));
    echo 'Добавлена строка: ' . $recordString;
  }
}
fclose($handle);
?>