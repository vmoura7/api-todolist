<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * @return array<string, mixed>
     */

     protected $model = Todo::class;



    public function definition()
    {
        return [
            'title' => $this->faker->sentence(nbWords: 3),
            'description' => $this->faker->sentence(nbWords: 5),
            'due_date' => $this->faker->date(),
            'is_done' => $this->faker->boolean(),
        ];
    }
}
