<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Resources\TodoResource;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
   public function index()
   {
      $users = User::with(relations: 'todos')->get();
      return UserResource::collection($users);
   }

   public function show($id)
   {
      $user = User::find($id);
      if ($user) {
         $user->load(relations: 'todos');
         return new UserResource($user);
      } else {
         return response()->json(['message' => 'Usuário não encontrado'], 404);
      }
   }

   public function showWithTodos(User $user)
    {
        $user->load('todos');
        return new UserResource($user);
    }


   public function store(Request $request)
   {
      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = bcrypt($request->input('password'));
      $user->save();

      return new UserResource($user);
   }

   public function storeTodo(User $user, TodoStoreRequest $request)
    {
        $input = $request->validated();

        $todo = $user->todos()->create($input);
        return new TodoResource($todo);
    }

   public function update(Request $request, $id)
   {
      $user = User::find($id);
      if ($user) {
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
         }
         $user->save();
         return new UserResource($user);
      } else {
         return response()->json(['message' => 'Usuário não encontrado'], 404);
      }
   }

   public function destroy($id)
   {
      $user = User::find($id);
      if ($user) {
         $user->delete();
         return response()->json(['message' => 'Usuário removido com sucesso'], 200);
      } else {
         return response()->json(['message' => 'Usuário não encontrado'], 404);
      }
   }
}
