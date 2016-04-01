<?php

abstract class Ingredient implements IngredientInterface
{
    /**
     * @var Price
     */
    private $price;

    /**
     * @param Price $price
     */
    public function __construct(Price $price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return get_class($this);
    }

    /**
     * @return Price
     */
    public function getPrice() : Price
    {
        return $this->price;
    }
}
