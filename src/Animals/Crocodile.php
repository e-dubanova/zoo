<?php

namespace Zoo\Animals;

class Crocodile extends Carnivores {

  /**
   * Плавает.
   * @return void
   */
  public function swim() {
    echo $this->name . " плывет." . '<br>';
  }
}