<?php

interface IngredientInterface
{
    /**
     * @return string
     */
    public function __toString() : string;

    /**
     * @return Price
     */
    public function getPrice() : Price;
}
