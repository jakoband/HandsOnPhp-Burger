<?php

class IngredientNameCollection
{
    /**
     * @var String[]
     */
    private $ingredientNames;

    /**
     * @param String[] ...$ingredientNames
     */
    public function __construct(string ...$ingredientNames)
    {
        $this->ingredientNames = $ingredientNames;
    }

    /**
     * @return bool
     */
    public function hasIngredients() : bool
    {
        return count($this->ingredientNames) > 0;
    }

    /**
     * @return String[]
     */
    public function getIngredientNames() : array
    {
        return $this->ingredientNames;
    }
}
