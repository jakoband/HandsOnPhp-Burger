<?php

class Burger
{
    /**
     * @var IngredientInterface[]
     */
    private $ingredients;

    /**
     * @param IngredientInterface[] $ingredients
     */
    public function __construct(IngredientInterface ...$ingredients)
    {
        $this->ensureIngredients($ingredients);

        $this->ingredients = $ingredients;
    }

    /**
     * @param array $ingredients
     *
     * @throws InvalidArgumentException
     */
    private function ensureIngredients(array $ingredients)
    {
        if (0 === count($ingredients)) {
            throw new InvalidArgumentException('Burger without ingredients is no burger.');
        }
    }

    /**
     * @return Price
     */
    public function getPrice() : Price
    {
        $burgerPrice = new Price(0, new ChfCurrency());

        foreach ($this->ingredients as $ingredient) {
            $burgerPrice = $burgerPrice->add($ingredient->getPrice());
        }

        return $burgerPrice;
    }

    /**
     * @return IngredientInterface[]
     */
    public function getIngredients() : array
    {
        return $this->ingredients;
    }
}
