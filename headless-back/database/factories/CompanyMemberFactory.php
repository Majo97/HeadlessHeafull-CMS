<?php

namespace Database\Factories;

use App\Models\CompanyMember;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class CompanyMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->randomElement([1, 2, 3, 4, 5,6,7]),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'created_by'  => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
