<?php

namespace Zoo;

use Zoo\Animals\Animal;

/**
 * Клетка.
 */
class Cage
{
  protected int $id; // идентификатор клетки
  protected string $animalType; //тип животных в клетке (хищники или травоядные)

  protected array $animals; // животные в клетке
  /**
   * Конструктор.
   * @param int $id
   *   Идентификатор клетки
   */
  public function __construct(int $id)
  {
    $this->id = $id;
    $this->animalType = "";
    $this->animals = [];
  }
  /**
   * Возвращает идентификатор клетки.
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }
  /**
   * Возвращает тип размещенных животных.
   * @return string
   */
  public function getAnimalType(): string
  {
    return $this->animalType;
  }
  /**
   * Очистка.
   * @throws \Exception
   *   Генерится исключение, если в клетке есть животное.
   * @return void
   */
  public function clean(): void
  {
    if ($this->isEmpty()) {
      echo 'Клетка ' . $this->id . ' очищена.' . '<br>';
    } else {
      throw new \Exception('Процедура очистки не может быть выполнена, если в клетке животное!' . '<br>');
    }
  }
  /**
   * Возвращает животных в клетке.
   * @return array
   */
  public function getAnimals(): array
  {
    return $this->animals;
  }
  /**
   * Добавить животное в клетку
   * @param \Zoo\Animals\Animal $animal
   *   Животное.
   * @throws \Exception
   *   Генерируется исключение при попытке разместить животных разных типов.
   * @return void
   */
  public function placeAnimal(Animal $animal): void
  {
    if (empty($this->animalType)) {
      $this->animalType = $animal->getNutritionType();
    } elseif ($this->animalType !== $animal->getNutritionType()) {
      throw new \Exception("Нельзя поместить в клетку животных с разными типами питания!" . '<br>');
    }
    $this->animals[] = $animal;
    echo "В клетке " . $this->id . " размещен " . $animal->getName() . '<br>';
  }
  /**
   * Возвращает true, если клетка пуста, в противном случае false.
   * @return bool
   */
  public function isEmpty(): bool
  {
    return empty($this->animals);
  }
  /**
   * Убирает животное из клетки.
   * @param \Zoo\Animals\Animal $animal
   * @throws \Exception
   * @return void
   */
  public function takeAnimal(Animal $animal): void
  {
    if ($this->isEmpty()) {
      throw new \Exception('Клетка пуста!');
    }
    $this->animals = array_filter(
      $this->animals,
      function (Animal $animalInCage) use ($animal) {
        return $animalInCage->getName() !== $animal->getName();
      }
    );
    echo "Из клетки " . $this->id . " забрали " . $animal->getName() . '<br>';
  }
  /**
   * Покормить животных.
   * @return void
   */
  public function feedAnimals()
  {
    if (!$this->isEmpty()) {
      foreach ($this->getAnimals() as $animal) {
        $animal->eat();
      }
    }
  }
}