<?php

$animals = array('Africa' => ['Hippopotamus amphibius', 'Panthera leo', 'Giraffa camelopardalis', 'Panthera pardus', 'Ophisaurus koellikeri', 'Panaspis', 'Gerrhosaurus multilineatus', 'Platysaurus capensis', 'Mesalina guttulata', 'Elephas maximus'], 'America' => 'Mixotoxodon larensis', 'Eurasia' => 'Rangifer tarandus');

$newAnimals = array();
foreach($animals as $animal) {
  $newAnimals[] = $animal;
}

for ($i = 0; $i < count($newAnimals); $i++) {
  echo $newAnimals[$i];
  }
  

?>