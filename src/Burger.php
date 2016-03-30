<?php

class Burger
{
    /**
     * @var IngredientCollection
     */
    private $ingredientCollection;

    /**
     * @param IngredientCollection $ingredientCollection
     */
    public function __construct(IngredientCollection $ingredientCollection)
    {
        $this->ingredientCollection = $ingredientCollection;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->ingredientCollection;
    }
}
