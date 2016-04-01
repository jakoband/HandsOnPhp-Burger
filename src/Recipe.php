<?php

abstract class Recipe implements RecipeInterface
{
    /**
     * @var IngredientNameCollection
     */
    private $ingredientNameCollection;

    /**
     * @var array
     */
    protected $ingredientNames;

    public function __construct()
    {
        $this->ensureNonEmptyCollection();
        $this->ensureCollectionContainsOnlyStrings();
    }

    /**
     * @throws RecipeException
     */
    private function ensureNonEmptyCollection()
    {
        if (0 === count($this->ingredientNames)) {
            throw new RecipeException(sprintf(
                'Recipe "%s" is not valid without ingredient names.',
                $this->getName()
            ));
        }
    }

    /**
     * @throws RecipeException
     */
    private function ensureCollectionContainsOnlyStrings()
    {
        array_walk($this->ingredientNames, function($ingredient) {
            if (!is_string($ingredient)) {
                throw new RecipeException(sprintf(
                    'Recipe "%s" contains of ingredient names that are not strings.',
                    $this->getName()
                ));
            }
        });
    }

    /**
     * @return IngredientNameCollection
     */
    public function getIngredientNameCollection()
    {
        if (is_null($this->ingredientNameCollection)) {
            $this->ingredientNameCollection = new IngredientNameCollection(...$this->ingredientNames);
        }

        return $this->ingredientNameCollection;
    }
}    
