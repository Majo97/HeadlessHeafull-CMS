<?php

namespace Database\Factories;

use App\Models\JobPosition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class JobPositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobPosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->randomElement([1, 2, 3, 4, 5,6,7]),
            'type_id' => $this->faker->randomElement([1, 2, 3, 4, 5]), 
         
            'title' => $this->faker->jobTitle,
            'image' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'requirements' => $this->faker->paragraph,
            'responsibilities' => $this->faker->paragraph,
            'expiration_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'created_by' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
