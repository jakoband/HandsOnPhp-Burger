<?php


class SwissNumberFormat implements NumberFormatInterface
{
    /**
     * @return int
     */
    public function getDecimals() : int
    {
        return 2;
    }

    /**
     * @return string
     */
    public function getDecimalPoint() : string
    {
        return '.';
    }

    /**
     * @return string
     */
    public function getThousandsSeparator() : string
    {
        return '\'';
    }
}

