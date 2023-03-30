<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\TodoController; 
use Illuminate\Support\Facades\Route;


//Users
Route::apiResource('users', UserController::class);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users/{user}/todos', [UserController::class, 'storeTodo']);

//Todos
Route::put('/todos/{todo}/done', [TodoController::class, 'markAsDone']);
Route::put('/todos/{todo}/undone', [TodoController::class, 'markAsUndone']);
Route::put('/todos/{todo}', [TodoController::class, 'update']);
Route::delete('/todos/{todo}', [TodoController::class, 'delete']);