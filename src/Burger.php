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
     * @return Price
     */
    public function getPrice() : Price
    {
        $burgerPrice = new Price(0, new ChfCurrency());

        foreach ($this->ingredientCollection->getIngredients() as $ingredient) {
            /** @var IngredientInterface $ingredient */
            $burgerPrice = $burgerPrice->add($ingredient->getPrice());
        }

        return $burgerPrice;
    }

    /**
     * @return IngredientCollection
     */
    public function getIngredients() : IngredientCollection
    {
        return $this->ingredientCollection;
    }
}
