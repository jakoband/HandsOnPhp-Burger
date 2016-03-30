<?php

class BurgerBuilder
{
    private $ingredientRepository;

    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function create(RecipeInterface $recipe)
    {
        $ingredientsList = $recipe->getIngredientList();

        if (!$ingredientsList->hasIngredients()) {
            throw new Exception('Recipe without ingredients given.');
        }

        $ingredients = [];

        foreach ($ingredientsList as $ingredientName) {
            $getIngredientMethodName = 'get' . ucfirst($ingredientName);
            $ingredients[] = $this->ingredientRepository->$getIngredientMethodName();
        }

        return new Burger(new IngredientCollection(...$ingredients));
    }
}    
