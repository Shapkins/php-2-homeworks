<?php

$query = urlencode(implode (' ', array_slice($argv, 1)));

if (count($argv) == 1) {
  echo 'Ошибка! Аргументы не заданы';
} else {
  $result = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=' . $query);
  $data = json_decode($result, true);
  if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_last_error_msg();
  } else {
    $handle = fopen('books.csv', 'a');
    for($i = 0; $i < count($data['items']); $i++) {
      $title = $data['items'][$i]['volumeInfo']['title'];
      $recordString = '"' . $title . '"';
      if (isset($data['items'][$i]['volumeInfo']['authors'])) {
        if ((count($data['items'][$i]['volumeInfo']['authors'])) > 1) {
          $authors = implode('; ', $data['items'][$i]['volumeInfo']['authors']);
          $recordString = $recordString . ',' . $authors;
        } else {
          $authors = $data['items'][$i]['volumeInfo']['authors'][0];
          $recordString = $recordString . ',' . $authors;
        }
      fputcsv($handle, array($recordString));
      }
    }
    fclose($handle); 
  }
}

?>