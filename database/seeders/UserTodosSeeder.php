<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Todo;
use App\Models\UserTodos;
use Illuminate\Database\Seeder;

class UserTodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();

        $users->each(function($user) {
            $todos = Todo::where('user_id', $user->id)->get();

            $todos->each(function($todo) use ($user) {
                UserTodos::create([
                    'user_id' => $user->id,
                    'todos_id' => $todo->id
                ]);
            });
        });
    }
}