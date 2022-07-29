<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassUNP extends Model
{
    use HasFactory;

    protected $table = 'class';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
