<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'website' => $this->faker->url,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'created_by' => $this->faker->randomElement([1,2,3,4,5]),
            
        ];
    }
}
