<?php

require_once __DIR__ . '/autoload.php';

use Zoo\Animals\Crocodile;
use Zoo\Animals\Elephant;
use Zoo\Animals\Lion;
use Zoo\Cage;

echo "Зоопарк" . '<br>';

$arcadiy = new Lion("Аркадий");
$mufassa = new Lion("Муфасса");
$simba = new Lion("Симба");
$gena = new Crocodile("Гена");
$crok = new Crocodile("Мистер Крок");
$dambo = new Elephant("Дамбо");

$cage1 = new Cage(1);
try {
  $cage1->clean();

  $cage1->placeAnimal($arcadiy);
  $cage1->placeAnimal($simba);
  $cage1->placeAnimal($dambo);
} catch (Exception $e) {
  echo $e->getMessage() . '<br>';
}

$cage2 = new Cage(2);
try {
  $cage2->clean();

  $cage2->placeAnimal($dambo);
} catch (Exception $e) {
  echo $e->getMessage() . '<br>';
}

$cage3 = new Cage(3);
try {
  $cage3->clean();

  $cage3->placeAnimal($mufassa);
  $cage3->takeAnimal($mufassa);

  $cage1->placeAnimal($mufassa);

  $cage3->placeAnimal($gena);
  $cage3->placeAnimal($crok);

  $cage3->clean();
} catch (Exception $e) {
  echo $e->getMessage() . '<br>';
}

$cage1->feedAnimals();
$cage2->feedAnimals();
$cage3->feedAnimals();

$mufassa->growl();
$simba->growl();
$dambo->spraysItselfWithItsTrunk();
$gena->swim();

echo '<br>';
$cage2->takeAnimal($dambo);
try {
  $cage2->clean();
} catch (Exception $e) {
  echo $e->getMessage() . '<br>';
}
$cage2->feedAnimals();
$cage1->takeAnimal($simba);
$cage2->placeAnimal($simba);
$cage2->takeAnimal($simba);
$cage2->placeAnimal($dambo);