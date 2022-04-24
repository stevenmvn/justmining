<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pics = [
            '2406',
            '2786',
            '3232',
            '4407',
            '4928',
            '4961',
            '5047',
            '5260',
            '5660',
            '5637',
            '6019',
            '6301',
            '7097',
            '7841',
            '7933',
            '8016',
            '8173',
            '9204',
            '9738',
            '9970',
        ];
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 0.01, 5),
            'picture' => 'products/' . Arr::random($pics) . '.png',
            'sallable' =>random_int(0, 1),
        ];
    }
}
