<?php

class ChfCurrency implements CurrencyInterface
{
    /**
     * @return string
     */
    public function getCode() : string
    {
        return 'CHF';
    }
}
