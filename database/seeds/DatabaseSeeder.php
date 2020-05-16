<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Bezhanov\Faker\Provider\Commerce;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faker->addProvider(new Commerce($faker));

        Product::query()->forceCreate([
            'name' => $faker->productName,
            'description' => $faker->promotionCode,
            'price' => $faker->randomFloat(null, 0),
            'count' => 0,
        ]);
    }
}
