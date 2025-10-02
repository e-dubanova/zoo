<?php

namespace Zoo\Animals;

/**
 * Хищник
 */
class Herbivores extends Animal
{

  public function __construct($name)
  {
    parent::__construct($name);
    $this->setNutritionType(self::CARNIVORES);
  }

  /**
   * Кушает.
   * @return void
   */
  public function eat(): void
  {
    echo $this->name . " кушает фрукты, овощи, траву, сено, ветки." . '<br>';
  }

}