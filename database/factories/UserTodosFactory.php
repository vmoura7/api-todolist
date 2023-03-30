<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Todo;
use App\Models\UserTodos;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTodosFactory extends Factory
{
    protected $model = UserTodos::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'todos_id' => Todo::factory(),
        ];
    }
}
