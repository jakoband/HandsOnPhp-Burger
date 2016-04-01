<?php
// enforce strict

require_once 'autoload.php';

$ingredientRepository = new IngredientRepository();
$currency = new ChfCurrency();

$ingredientRepository
    ->addIngredient(new BreadBottomSide(new Price(20, $currency)))
    ->addIngredient(new BreadBottomSide(new Price(20, $currency)))
    ->addIngredient(new BreadTopSide(new Price(25, $currency)))
    ->addIngredient(new BreadTopSide(new Price(25, $currency)))
    ->addIngredient(new Cheese(new Price(30, $currency)))
    ->addIngredient(new Cheese(new Price(30, $currency)))
    ->addIngredient(new Patty(new Price(80, $currency)))
    ->addIngredient(new Salad(new Price(15, $currency)))
    ->addIngredient(new Salad(new Price(15, $currency)))
    ->addIngredient(new Sauce(new Price(15, $currency)))
    ->addIngredient(new Sauce(new Price(15, $currency)))
    ->addIngredient(new Tomato(new Price(10, $currency)))
    ->addIngredient(new Tomato(new Price(10, $currency)));

$burgerBuilder = new BurgerBuilder($ingredientRepository);

$burgerRecipesToBuild = [
    new HamburgerRecipe(),
    new CheeseburgerRecipe()
];

$renderer = new PlaintextBurgerRenderer();

foreach ($burgerRecipesToBuild as $recipe) {
    /** @var RecipeInterface $recipe */

    try {
        $burger = $burgerBuilder->build($recipe);
        // ToDo: add burger to viewmodel converter
        $burgerViewModel = new BurgerViewModel(
            $recipe->getName(),
            // ToDo: add price formatter with currency
            'CHF ' . round($burger->getPrice($currency)->getAmountInLowestUnit()/100, 2),
            implode(' + ', $burger->getIngredients())
        );
        echo $renderer->render($burgerViewModel);

    } catch (Exception $e) {
        printf(
            '"%s" konnte nicht zubereitet werden. Meldung: \'%s\'',
            $recipe->getName(),
            $e->getMessage()
        );
    }
}
