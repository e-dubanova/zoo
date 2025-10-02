<?php

namespace Zoo\Animals;

abstract class Animal
{
    //herbivores - травоядные, сarnivores - хищники
  const HERBIVORES = 'herbivores'; // травоядные
  const CARNIVORES = 'сarnivores'; // хищники
  const ALLOWED_NUTRITION_TYPES = [self::HERBIVORES, self::CARNIVORES];

  // Считаем имя в качестве уникального идентификатора. 
  // Логично, что лев Аркадий будет один в зоопарке.
  protected string $name; // Имя  
  protected string $nutritionType; // Тип питания
  protected $cageId; //идентификатор клетки
   
  public function __construct($name, $cageId = NULL)
  {
    $this->name = $name;
    $this->cageId = $cageId;
  }

  /**
   * Возвращает имя животного.
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  public function getNutritionType(): string
  {
    return $this->nutritionType;
  }

  /**
   * 
   * @param string $nutritionType
   * @throws \InvalidArgumentException
   * @return void
   */
  protected function setNutritionType(string $nutritionType): void {
    if(!$this->validateNutritionType($nutritionType)) {
      throw new \InvalidArgumentException("Статус '$nutritionType' недопустим. Допустимые значения: "
       . implode(', ', self::ALLOWED_NUTRITION_TYPES));
    }
    $this->nutritionType = $nutritionType;
  }

  /**
   * Валидация типа питания
   * @param string $nutritionType
   *   Тип питания
   * @return bool
   */
  protected function validateNutritionType(string $nutritionType): bool
  {
    return in_array($nutritionType, self::ALLOWED_NUTRITION_TYPES);
  }
  /**
   * Каждое животное питается.
   * @return void
   */
  abstract public function eat();
}