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
    public function build(RecipeInterface $recipe) : Burger
    {
        $ingredientsList = $recipe->getIngredientNameCollection();

        if (!$ingredientsList->hasIngredients()) {
            throw new BurgerBuilderException(sprintf(
                'Rezept "%s" ohne Zutaten übergeben.',
                $recipe->getName()
            ));
        }

        $ingredients = [];

        foreach ($ingredientsList->getIngredientNames() as $ingredientName) {
            $ingredients[] = $this->ingredientRepository->getIngredient($ingredientName);
        }
        return new Burger($recipe->getName(), ...$ingredients);
    }
}
