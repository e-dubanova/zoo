<?php

namespace Zoo\Animals;

class Elephant extends Herbivores {

  /**
   * Поливает себя хоботом.
   * @return void
   */
  public function spraysItselfWithItsTrunk() {
    echo $this->name . " поливает себя из хобота." . '<br>';
  }
}