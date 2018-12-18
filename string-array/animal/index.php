<?php

$animals = array(
  "Africa" => array("Etmopterus polli", "Atelerix", "Dasypeltis scabra", "Anas smithii"),
  "America" => array("Harpia harpyja", "Rhinoclemmys punctularia", "Sterna hirundinacea", "Lycalopex griseus"),
  "Eurasia" => array("Capreolus capreolus", "Mustelus mustelus", "Agonus cataphractus WORD", "Merluccius merluccius")
);
$newAnimals = array();
$parts = array ();
$counts = array();
$continents = array();
$currentCount = 0;


//ищем все из двух слов
foreach ($animals as $continent => $animal) {
  $count = 0;
  for ($i = 0; $i < count($animal); $i++) {
    if (substr_count("$animal[$i]", " ") == 1) {
      $count++;
      $newanimals[] = $animal[$i];
    }
  }
  array_push($counts, $count);
  array_push($continents, $continent);
}

//делим на слова
for ($i = 0; $i < count($newanimals); $i++) {
  $parts = explode (" ", $newanimals[$i]);
  $firstanimals[] = $parts[0] . " ";
  $secondanimals[] = $parts[1];
}

//перемешиваем
shuffle($secondanimals);
for ($i = 0; $i < count($newanimals); $i++) {
  $newanimals[$i] = "$firstanimals[$i]"."$secondanimals[$i]";
}
$list = implode (",", $newanimals);

//вывод
$parts = explode (",", $list);
for ($i = 0; $i < count($counts); $i++) {
  echo '<h2>' . $continents[$i] . '</h2>';
  echo (implode (', ', array_slice($parts, $currentCount, $counts[$i])));
  $currentCount += $counts[$i];
}

?>