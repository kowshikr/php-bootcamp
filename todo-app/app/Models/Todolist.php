<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $fillable = [
        'id',
        'task_name',
        'users_id',
        'status',
    ];
    use HasFactory;
}
