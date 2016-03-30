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

$hamburgerRecipe = new HamburgerRecipe();
$hamburger = $burgerBuilder->build($hamburgerRecipe);
echo 'Hamburger: ' . $hamburger . chr(10);

$cheeseburgerRecipe = new CheeseburgerRecipe($ingredientRepository);
$cheeseburger = $burgerBuilder->build($cheeseburgerRecipe);
if (!is_null($cheeseburger)) {
    echo 'Cheeseburger: ' . $cheeseburger . chr(10);
}

