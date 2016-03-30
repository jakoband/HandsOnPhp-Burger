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
        return sprintf(
            'Zutaten: %s, Preis: %d',
            (string) $this->ingredientCollection,
            $this->calculatePrice()->getAmountInLowestUnit()
        );
    }

    /**
     * @return Price
     */
    private function calculatePrice() : Price
    {
        $burgerPrice = new Price(0, new ChfCurrency());

        foreach ($this->ingredientCollection->getIngredients() as $ingredient) {
            $burgerPrice = $burgerPrice->add($ingredient->getPrice());
        }

        return $burgerPrice;
    }
}
