<?php

class BurgerBuilder
{
    /**
     * @var IngredientRepository
     */
    private $ingredientRepository;

    /**
     * @param IngredientRepository $ingredientRepository
     */
    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * @param RecipeInterface $recipe
     * @return Burger
     * @throws Exception
     */
    public function build(RecipeInterface $recipe)
    {
        $ingredientsList = $recipe->getIngredientNameCollection();

        if (!$ingredientsList->hasIngredients()) {
            throw new Exception('Rezept ohne Zutaten übergeben.');
        }

        $ingredients = [];

        foreach ($ingredientsList->getIngredientNames() as $ingredientName) {
            $ingredients[] = $this->ingredientRepository->getIngredient($ingredientName);
        }
        return new Burger(new IngredientCollection(...$ingredients));
    }
}
