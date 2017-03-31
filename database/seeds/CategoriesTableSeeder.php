<?php

use Illuminate\Database\Seeder;

use AppFinancial\Traits\GetClientsTrait;

class CategoriesTableSeeder extends Seeder
{
    use GetClientsTrait;

    public function run()
    {
        $clients = $this->getClients();

        factory(\AppFinancial\Models\Category::class, 30)
            ->make()
            ->each(function ($category) use ($clients) {
                $client = $clients->random();

                $category->client_id = $client->id;
                $category->save();
            });

        $categoriesRoot = $this->getCategoriesRoot();

        foreach ($categoriesRoot as $root) {
            factory(\AppFinancial\Models\Category::class, 3)
                ->make()
                ->each(function ($child) use ($root) {
                    $child->client_id = $root->client_id;
                    $child->save();

                    $child->parent()->associate($root);
                    $child->save();
                });
        }
    }

    private function getCategoriesRoot ()
    {
        $repository = app(\AppFinancial\Repositories\CategoryRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}
