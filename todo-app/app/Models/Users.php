<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
    ];
    use HasFactory;
    public function dolists()
    {
        return $this->hasMany(Todolist::class);
    }
}
