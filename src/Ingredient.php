<?php

abstract class Ingredient implements IngredientInterface
{
    /**
     * @var int
     */
    private $priceInCents;

    /**
     * @param $priceInCents
     */
    public function __construct($priceInCents)
    {
        $this->priceInCents = $priceInCents;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return get_class($this);
    }

    /**
     * @return int
     */
    public function getPriceInCents()
    {
        return $this->priceInCents;
    }
}