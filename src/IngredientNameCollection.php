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
        $this->ensureNonEmptyCollection($ingredientNames);

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

    /**
     * @param string[] $ingredientNames
     * @throws EmptyCollectionException
     */
    private function ensureNonEmptyCollection($ingredientNames)
    {
        if (0 === count($ingredientNames)) {
            throw new EmptyCollectionException('Collection must have at least one ingredient name.');
        }
    }
}
