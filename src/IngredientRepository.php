<?php

class IngredientRepository
{
    /**
     * @var array
     */
    private $storage = [
        'BreadBottomSide' => [],
        'BreadTopSide' => [],
        'Cheese' => [],
        'Patty' => [],
        'Salad' => [],
        'Sauce' => [],
        'Tomatoe' => [],
    ];

    private function getIngredientByName($ingredientName)
    {
        if (!$this->hasIngredient($ingredientName)) {
            throw new InvalidArgumentException('Ingredient not found');
        }
        return array_pop($this->storage[$ingredientName]);
    }

    /**
     * @param Ingredient $ingredient
     * @return IngredientRepository
     */
    private function addIngredient(Ingredient $ingredient)
    {
        if (!$this->canStoreIngredient($ingredient)) {
            throw new InvalidArgumentException(sprintf('Cannot store ingredient "%s"', $ingredient));
        }

        $name = (string) $ingredient;
        array_unshift($this->storage[$name], $ingredient);

        return $this;
    }

    private function canStoreIngredient($ingredient)
    {
        return array_key_exists((string) $ingredient, $this->storage);
    }

    private function hasIngredient($ingredientName)
    {
        if (!array_key_exists($ingredientName, $this->storage)) {
            return false;
        }
        if (0 === count($this->storage[$ingredientName])) {
            return false;
        }

        return true;
    }

    /**
     * @param BreadBottomSide $breadBottomSide
     * @return IngredientRepository
     */
    public function addBreadBottomSide(BreadBottomSide $breadBottomSide)
    {
        return $this->addIngredient($breadBottomSide);
    }

    public function addBreadTopSide(BreadTopSide $breadTopSide)
    {
        return $this->addIngredient($breadTopSide);
    }

    public function addCheese(Cheese $cheese)
    {
        return $this->addIngredient($cheese);
    }

    public function addPatty(Patty $patty)
    {
        return $this->addIngredient($patty);
    }

    public function addSalad(Salad $salad)
    {
        return $this->addIngredient($salad);
    }

    public function addSauce(Sauce $sauce)
    {
        return $this->addIngredient($sauce);
    }

    public function addTomatoe(Tomatoe $tomatoe)
    {
        return $this->addIngredient($tomatoe);
    }

    /**
     * @return mixed
     */
    public function getBreadBottomSide()
    {
        return $this->getIngredientByName('BreadBottomSide');
    }

    public function getBreadTopSide()
    {
        return $this->getIngredientByName('BreadTopSide');
    }

    public function getCheese()
    {
        return $this->getIngredientByName('Cheese');
    }

    public function getPatty()
    {
        return $this->getIngredientByName('Patty');
    }

    public function getSalad()
    {
        return $this->getIngredientByName('Salad');
    }

    public function getSauce()
    {
        return $this->getIngredientByName('Sauce');
    }

    public function getTomatoe()
    {
        return $this->getIngredientByName('Tomatoe');
    }
}
