<?php


interface PriceFormatterInterface
{
    /**
     * @param Price $price
     * @return string
     */
    public function formatPrice(Price $price) : string;
}

