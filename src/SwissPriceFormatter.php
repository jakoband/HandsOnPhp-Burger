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
     * @param Price $price
     * @return string
     */
    public function formatPrice(Price $price) : string
    {
        $formattedPrice = number_format(
            $price->getAmountInLowestUnit() / 100,
            $this->format->getDecimals(),
            $this->format->getDecimalPoint(),
            $this->format->getThousandsSeparator()
        );

        return sprintf('CHF %s', $formattedPrice);
    }
}

