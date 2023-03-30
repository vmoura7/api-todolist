<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $users->each(function($user) {
            $user->todos()->createMany(Todo::factory(10)->make()->toArray());
        });
             
    }
}
