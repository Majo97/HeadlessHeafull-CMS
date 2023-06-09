<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\JobPosition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position_id' => $this->faker->randomElement([1,2,3,4,5]),
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'cv' => 'cv/' . Str::random(10) . '.pdf',
            'privacy_consent' => $this->faker->boolean,
        ];
    }
}
