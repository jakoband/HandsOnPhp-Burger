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
     *
     * @throws UnavailableIngredientException
     */
    public function getIngredient($ingredientName) : IngredientInterface
    {
        if (!$this->hasIngredient($ingredientName)) {
            throw new UnavailableIngredientException(sprintf('Zutat "%s" ist nicht mehr vorhanden', $ingredientName));
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
     * @throws InvalidIngredientException
     */
    private function ensureValidIngredient(IngredientInterface $ingredient)
    {
        $name = (string) $ingredient;
        if (!isset($this->storage[$name])) {
            throw new InvalidIngredientException(sprintf('"%s" ist keine erlaubte Zutat.', $name));
        }
    }
}
