<?php

require_once 'autoload.php';

$ingredientRepository = new IngredientRepository();

$ingredientRepository
    ->addBreadBottomSide(new BreadBottomSide())
    ->addBreadBottomSide(new BreadBottomSide())
    ->addBreadTopSide(new BreadTopSide())
    ->addBreadTopSide(new BreadTopSide())
    ->addCheese(new Cheese())
    ->addCheese(new Cheese())
    ->addPatty(new Patty())
    ->addSalad(new Salad())
    ->addSalad(new Salad())
    ->addSauce(new Sauce())
    ->addSauce(new Sauce())
    ->addTomatoe(new Tomatoe())
    ->addTomatoe(new Tomatoe());

$burgerBuilder = new BurgerBuilder($ingredientRepository);

$hamburgerRecipe = new HamburgerRecipe();
$hamburger = $burgerBuilder->create($hamburgerRecipe);
echo 'Hamburger: ' . $hamburger . chr(10);

$cheeseburgerRecipe = new CheeseburgerRecipe($ingredientRepository);
$cheeseburger = $burgerBuilder->create($cheeseburgerRecipe);
echo 'Cheeseburger: ' . $cheeseburger . chr(10);

