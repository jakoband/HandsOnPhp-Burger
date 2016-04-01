<?php

class Burger
{
    /**
     * @var IngredientInterface[]
     */
    private $ingredients;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     * @param IngredientInterface[] $ingredients
     */
    public function __construct(string $name, IngredientInterface ...$ingredients)
    {
        $this->ensureNonEmptyName($name);
        $this->name = $name;

        $this->ensureIngredients($ingredients);
        $this->ingredients = $ingredients;
    }

    private function ensureNonEmptyName($name)
    {
        if ($name === '') {
            throw new InvalidArgumentException('Name of the burger cannot be empty.');
        }
    }

    /**
     * @param array $ingredients
     *
     * @throws MissingIngredientException
     */
    private function ensureIngredients(array $ingredients)
    {
        if (0 === count($ingredients)) {
            throw new MissingIngredientException('Burger without ingredients is no burger.');
        }
    }

    /**
     * @param CurrencyInterface $currency
     * @return Price
     */
    public function getPrice(CurrencyInterface $currency) : Price
    {
        $burgerPrice = new Price(0, $currency);

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

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
