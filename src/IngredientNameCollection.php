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
    public function hasIngredients()
    {
        return count($this->ingredientNames) > 0;
    }

    public function getIngredientNames()
    {
        return $this->ingredientNames;
    }
}