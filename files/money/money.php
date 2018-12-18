<?php

$sum = 0;
$handle = fopen('money.csv', 'w+');
if (implode (' ', array_slice($argv, 1)) == '--today') {
  $data = fgetcsv($handle, 1000, ',');
  echo $data;
//  for ($i = 0; i < count($data); $i++) {
  //  if ($data[$i][0] === date('Y-m-d')) {
    //  $sum += $data[$i][1];
  //  }
//  }
  if ($data[0] === date('Y-m-d')) {
    $sum += $data[1];
  }
  echo $sum;
} else {
  $recordString = implode (', ', array(date('Y-m-d'), $argv[1], implode (' ', array_slice($argv, 2))));
  fputcsv($handle, array($recordString));
  echo 'Добавлена строка: ' . $recordString;
}
fclose($handle);
?>