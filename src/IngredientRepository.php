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
        'Tomato' => [],
    ];

    /**
     * @param $ingredientName
     * @return IngredientInterface
     */
    private function getIngredientByName($ingredientName)
    {
        if (!$this->hasIngredient($ingredientName)) {
            throw new InvalidArgumentException(sprintf('Ingredient "%s" not found', $ingredientName));
        }
        return array_pop($this->storage[$ingredientName]);
    }

    /**
     * @param string $ingredientName
     * @return bool
     */
    private function hasIngredient($ingredientName)
    {
        if (0 === count($this->storage[$ingredientName])) {
            return false;
        }

        return true;
    }

    /**
     * @param Ingredient $ingredient
     * @return IngredientRepository
     */
    private function addIngredient(Ingredient $ingredient)
    {
        $name = (string) $ingredient;
        array_unshift($this->storage[$name], $ingredient);

        return $this;
    }

    /**
     * @param BreadBottomSide $breadBottomSide
     * @return IngredientRepository
     */
    public function addBreadBottomSide(BreadBottomSide $breadBottomSide)
    {
        return $this->addIngredient($breadBottomSide);
    }

    /**
     * @param BreadTopSide $breadTopSide
     * @return IngredientRepository
     */
    public function addBreadTopSide(BreadTopSide $breadTopSide)
    {
        return $this->addIngredient($breadTopSide);
    }

    /**
     * @param Cheese $cheese
     * @return IngredientRepository
     */
    public function addCheese(Cheese $cheese)
    {
        return $this->addIngredient($cheese);
    }

    /**
     * @param Patty $patty
     * @return IngredientRepository
     */
    public function addPatty(Patty $patty)
    {
        return $this->addIngredient($patty);
    }

    /**
     * @param Salad $salad
     * @return IngredientRepository
     */
    public function addSalad(Salad $salad)
    {
        return $this->addIngredient($salad);
    }

    /**
     * @param Sauce $sauce
     * @return IngredientRepository
     */
    public function addSauce(Sauce $sauce)
    {
        return $this->addIngredient($sauce);
    }

    /**
     * @param Tomato $tomato
     * @return IngredientRepository
     */
    public function addTomato(Tomato $tomato)
    {
        return $this->addIngredient($tomato);
    }

    /**
     * @return BreadBottomSide
     */
    public function getBreadBottomSide()
    {
        return $this->getIngredientByName('BreadBottomSide');
    }

    /**
     * @return BreadTopSide
     */
    public function getBreadTopSide()
    {
        return $this->getIngredientByName('BreadTopSide');
    }

    /**
     * @return Cheese
     */
    public function getCheese()
    {
        return $this->getIngredientByName('Cheese');
    }

    /**
     * @return Patty
     */
    public function getPatty()
    {
        return $this->getIngredientByName('Patty');
    }

    /**
     * @return Salad
     */
    public function getSalad()
    {
        return $this->getIngredientByName('Salad');
    }

    /**
     * @return Sauce
     */
    public function getSauce()
    {
        return $this->getIngredientByName('Sauce');
    }

    /**
     * @return Tomato
     */
    public function getTomato()
    {
        return $this->getIngredientByName('Tomato');
    }
}