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
     * @param string $ingredientName
     * @return IngredientInterface
     */
    public function getIngredient($ingredientName) : IngredientInterface
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
    private function hasIngredient($ingredientName) : bool
    {
        if (0 === count($this->storage[$ingredientName])) {
            return false;
        }

        return true;
    }

    /**
     * @param IngredientInterface $ingredient
     * @return IngredientRepository
     */
    public function addIngredient(IngredientInterface $ingredient) : IngredientRepository
    {
        $this->ensureValidIngredient($ingredient);

        array_unshift($this->storage[(string) $ingredient], $ingredient);

        return $this;
    }

    /**
     * @param IngredientInterface $ingredient
     * @throws InvalidArgumentException
     */
    private function ensureValidIngredient(IngredientInterface $ingredient)
    {
        $name = (string) $ingredient;
        if (!isset($this->storage[$name])) {
            throw new InvalidArgumentException(sprintf('Ingredient "%s" can not be stored.', $name));
        }
    }
}
