<?php

namespace Zoo;

class Zoo {
  private $cages = []; // клетки
  
  /**
   * Добавляет клетку в зоопарк.
   * @param \Zoo\Cage $cage
   * @return void
   */
  public function addCage(Cage $cage): void {
    $this->cages[] = $cage;
  }
  /**
   * Возвращает клетки в зоопарке.
   * @return Cage[]
   */
  public function getCages(): array {
    return $this->cages;
  }
}