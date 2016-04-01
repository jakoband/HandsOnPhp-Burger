<?php

class IngredientCollection
{
    /**
     * @var IngredientInterface[]
     */
    private $ingredients;

    /**
     * IngredientCollection constructor.
     * @param IngredientInterface[] ...$ingredients
     */
    public function __construct(IngredientInterface ...$ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode(' + ', $this->ingredients);
    }

    /**
     * @return IngredientInterface[]
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}
