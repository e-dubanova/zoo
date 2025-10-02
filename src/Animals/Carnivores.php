<?php

namespace Zoo\Animals;

/**
 * Травоядное животное
 */
class Carnivores extends Animal
{

  public function __construct($name)
  {
    parent::__construct($name);
    $this->setNutritionType(self::HERBIVORES);
  }

  /**
   * Кушает.
   * @return void
   */
  public function eat(): void
  {
    echo $this->name . " кушает мясо.<br>";
  }

  /**
   * Рычит.
   * @return void
   */
  public function growl()
  {
    echo $this->name . " рычит рррр-ррр-ррр." . '<br>';
  }
}