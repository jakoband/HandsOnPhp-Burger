<?php


interface NumberFormatInterface
{
    /**
     * @return int
     */
    public function getDecimals() : int;

    /**
     * @return string
     */
    public function getDecimalPoint() : string;

    /**
     * @return string
     */
    public function getThousandsSeparator() : string;
}

