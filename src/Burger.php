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
        return sprintf('Zutaten: %s, Preis: %d', (string) $this->ingredientCollection, $this->calculatePrice());
    }

    /**
     * @return int
     */
    private function calculatePrice()
    {
        $sum = 0;
        foreach ($this->ingredientCollection->getIngredients() as $ingredient) {
            $sum += $ingredient->getPriceInCents();
        }

        return $sum;
    }
}
