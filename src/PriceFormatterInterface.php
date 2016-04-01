<?php


interface PriceFormatterInterface
{
    /**
     * @param int $priceInLowestUnit
     * @return string
     */
    public function formatPriceFromLowestUnit(int $priceInLowestUnit) : string;
}

