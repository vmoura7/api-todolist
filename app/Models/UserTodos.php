<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTodos extends Model
{
    use HasFactory;

    protected $table = 'user_todos';

    protected $fillable = [
        'user_id',
        'todos_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function todos()
    {
        return $this->belongsTo(Todo::class);
    }
}
