<?php

class IngredientCollection
{
    /**
     * @var Ingredient[]
     */
    private $ingredients;

    /**
     * IngredientCollection constructor.
     * @param Ingredient[] ...$ingredients
     */
    public function __construct(Ingredient ...$ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function __toString()
    {
        return implode(' + ', $this->ingredients);
    }
}