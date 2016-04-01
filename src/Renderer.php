<?php


class Renderer
{
    /**
     * @param BurgerViewModel $burgerViewModel
     */
    public function render(BurgerViewModel $burgerViewModel)
    {
        echo sprintf(
            '"%s": Zutaten: %s, Preis: %s' . PHP_EOL,
            $burgerViewModel->getName(),
            $burgerViewModel->getIngredients(),
            $burgerViewModel->getFormattedPrice()
        );
    }

    /**
     * @param string $errorMessage
     */
    public function renderErrorMessage(string $errorMessage)
    {
        echo $errorMessage . PHP_EOL;
    }
}
