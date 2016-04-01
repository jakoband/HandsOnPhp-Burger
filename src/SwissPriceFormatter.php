<?php


class SwissPriceFormatter implements PriceFormatterInterface
{
    /**
     * @var NumberFormatInterface
     */
    private $format;

    /**
     * @param NumberFormatInterface $numberFormat
     */
    public function __construct(NumberFormatInterface $numberFormat)
    {
        $this->format = $numberFormat;
    }

    /**
     * @param int $priceInLowestUnit
     * @return string
     */
    public function formatPriceFromLowestUnit(int $priceInLowestUnit) : string
    {
        $formattedPrice = number_format(
            $priceInLowestUnit / 100,
            $this->format->getDecimals(),
            $this->format->getDecimalPoint(),
            $this->format->getThousandsSeparator()
        );

        return sprintf('CHF %s', $formattedPrice);
    }
}

