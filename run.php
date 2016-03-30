<?php

require_once 'autoload.php';

$ingredientRepository = new IngredientRepository();

$ingredientRepository
    ->addBreadBottomSide(new BreadBottomSide(20))
    ->addBreadBottomSide(new BreadBottomSide(20))
    ->addBreadTopSide(new BreadTopSide(25))
    ->addBreadTopSide(new BreadTopSide(25))
    ->addCheese(new Cheese(30))
    ->addCheese(new Cheese(30))
    ->addPatty(new Patty(80))
    ->addSalad(new Salad(15))
    ->addSalad(new Salad(15))
    ->addSauce(new Sauce(15))
    ->addSauce(new Sauce(15))
    ->addTomato(new Tomato(10))
    ->addTomato(new Tomato(10));

$burgerBuilder = new BurgerBuilder($ingredientRepository);

$hamburgerRecipe = new HamburgerRecipe();
$hamburger = $burgerBuilder->create($hamburgerRecipe);
echo 'Hamburger: ' . $hamburger . chr(10);

$cheeseburgerRecipe = new CheeseburgerRecipe($ingredientRepository);
$cheeseburger = $burgerBuilder->create($cheeseburgerRecipe);
if (!is_null($cheeseburger)) {
    echo 'Cheeseburger: ' . $cheeseburger . chr(10);
}

