<?php

interface IngredientInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @return Price
     */
    public function getPrice();
}
