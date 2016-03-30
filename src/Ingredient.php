<?php

abstract class Ingredient implements IngredientInterface
{
    /**
     * @var Price
     */
    private $price;

    /**
     * @param $price
     */
    public function __construct($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return get_class($this);
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }
}