<?php

interface IngredientInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @return int
     */
    public function getPrice();
}