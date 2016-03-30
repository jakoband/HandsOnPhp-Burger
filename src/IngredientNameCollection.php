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
     * @return string
     */
    public function __toString()
    {
        return implode(' + ', $this->ingredientNames);
    }

    /**
     * @return bool
     */
    public function hasIngredients()
    {
        return count($this->ingredientNames) > 0;
    }
}