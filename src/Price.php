<?php

class Price
{
    /**
     * @var int
     */
    private $amountInLowestUnit;

    /**
     * @var CurrencyInterface
     */
    private $currency;

    /**
     * @param int $amountInLowestUnit
     * @param CurrencyInterface $currency
     * @throws InvalidArgumentException
     */
    public function __construct(int $amountInLowestUnit, CurrencyInterface $currency)
    {
        $this->ensureGreaterOrEqualZero($amountInLowestUnit);

        $this->amountInLowestUnit = $amountInLowestUnit;
        $this->currency = $currency;
    }

    /**
     * @param Price $price
     * @return Price
     */
    public function add(Price $price) : Price
    {
        $this->ensureSameCurrency($price);

        return new static(
            $this->amountInLowestUnit + $price->getAmountInLowestUnit(),
            $this->getCurrency()
        );
    }

    /**
     * @return int
     */
    public function getAmountInLowestUnit() : int
    {
        return $this->amountInLowestUnit;
    }

    /**
     * @return CurrencyInterface
     */
    public function getCurrency() : CurrencyInterface
    {
        return $this->currency;
    }

    /**
     * @param Price $price
     * @throws InvalidArgumentException
     */
    private function ensureSameCurrency(Price $price)
    {
        if ($price->getCurrency()->getCode() !== $this->getCurrency()->getCode()) {
            throw new InvalidArgumentException(sprintf(
                'Currency "%s" cannot be added to currency "%s"',
                $price->getCurrency()->getCode(),
                $this->getCurrency()->getCode()
            ));
        }
    }

    /**
     * @param int $amountInLowestUnit
     * @throws InvalidArgumentException
     */
    private function ensureGreaterOrEqualZero(int $amountInLowestUnit)
    {
        if ($amountInLowestUnit < 0) {
            throw new InvalidArgumentException(sprintf('Amount "%d" must be greater than zero', $amountInLowestUnit));
        }
    }
}
