<?php


class PlaintextBurgerRenderer
{
    /**
     * @param BurgerViewModel $burgerViewModel
     *
     * @return string
     */
    public function render(BurgerViewModel $burgerViewModel)
    {
        return sprintf(
            '"%s": Zutaten: %s, Preis: %s' . PHP_EOL,
            $burgerViewModel->getName(),
            $burgerViewModel->getIngredients(),
            $burgerViewModel->getFormattedPrice()
        );
    }
}
