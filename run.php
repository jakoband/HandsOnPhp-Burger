<?php
// enforce strict

require_once 'autoload.php';

$ingredientRepository = new IngredientRepository();

$ingredientRepository
    ->addIngredient(new BreadBottomSide(new Price(20, new ChfCurrency())))
    ->addIngredient(new BreadBottomSide(new Price(20, new ChfCurrency())))
    ->addIngredient(new BreadTopSide(new Price(25, new ChfCurrency())))
    ->addIngredient(new BreadTopSide(new Price(25, new ChfCurrency())))
    ->addIngredient(new Cheese(new Price(30, new ChfCurrency())))
    ->addIngredient(new Cheese(new Price(30, new ChfCurrency())))
    ->addIngredient(new Patty(new Price(80, new ChfCurrency())))
    ->addIngredient(new Salad(new Price(15, new ChfCurrency())))
    ->addIngredient(new Salad(new Price(15, new ChfCurrency())))
    ->addIngredient(new Sauce(new Price(15, new ChfCurrency())))
    ->addIngredient(new Sauce(new Price(15, new ChfCurrency())))
    ->addIngredient(new Tomato(new Price(10, new ChfCurrency())))
    ->addIngredient(new Tomato(new Price(10, new ChfCurrency())));

$burgerBuilder = new BurgerBuilder($ingredientRepository);

$burgerRecipesToBuild = [
    new HamburgerRecipe(),
    new CheeseburgerRecipe()
];

foreach ($burgerRecipesToBuild as $recipe) {
    /** @var RecipeInterface $recipe */

    try {
        $burger = $burgerBuilder->build($recipe);
        echo sprintf('"%s": %s' . PHP_EOL, $recipe->getName(), (string) $burger);

    } catch (Exception $e) {
        echo sprintf('"%s" konnte nicht zubereitet werden. Meldung: "%s"' . PHP_EOL, $recipe->getName(), $e->getMessage());
    }
}

