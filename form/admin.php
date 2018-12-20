<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Страница загрузки</title>
</head>
<body>
  <form enctype="multipart/form-data" action="list.php" method="POST">
  <!-- Название элемента input определяет имя в массиве $_FILES -->
  Аватар: <input name="userfile" type="file" />
  <br />
  <input type="submit" value="Отправить">
  </form>
</body>
</html>