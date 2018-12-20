<?php

$handle = fopen('https://raw.githubusercontent.com/netology-code/php-2-homeworks/master/files/countries/opendata.csv', 'r');
$data = fgetcsv($handle, 1000, ',');

if (count($argv) == 1) {
  echo 'Ошибка! Аргументы не заданы';
  
} else {
  do {
    $data = fgetcsv($handle, 1000, ',');
    if ($data[1] === $argv[1]) {
      echo $data[1] . ': ' . $data[4];
      break;
    }
  } while ($data[0] !== NULL);
  
  fclose($handle);
  
  if ($data[1] !== $argv[1]) {
    $handle = fopen('https://raw.githubusercontent.com/netology-code/php-2-homeworks/master/files/countries/opendata.csv', 'r');
    do {
      $data = fgetcsv($handle, 1000, ',');
      $lev = levenshtein($data[1], $argv[1]);
      for ($i = 0; $i < 4; $i++) {
        if ($lev === $i) {
          echo $data[1] . ': ' . $data[4];
          break 2;
        }
      }
    } while ($data[0] !== NULL);
    fclose($handle);
  }
}

?>