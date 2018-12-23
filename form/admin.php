<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Страница загрузки</title>
</head>
<body>
  <form enctype="multipart/form-data" action="list.php" method="POST">
  Тест: <input name="userfile" type="file" />
  <br />
  <input type="submit" value="Отправить">
  </form>
</body>
</html>

<?php
if (!(empty($_FILES))) {
  $uploaddir = './tests/';
  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
  } else {
    echo "Возможная атака с помощью файловой загрузки!\n";
  }
}

?>