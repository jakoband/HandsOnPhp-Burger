<?php


class BurgerViewModel
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $formattedPrice;

    /**
     * @var string
     */
    private $ingredients;

    /**
     * @param string $name
     * @param string $formattedPrice
     * @param string $ingredients
     */
    public function __construct(string $name, string $formattedPrice, string $ingredients)
    {
        $this->name = $name;
        $this->formattedPrice = $formattedPrice;
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFormattedPrice()
    {
        return $this->formattedPrice;
    }

    /**
     * @return string
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}
