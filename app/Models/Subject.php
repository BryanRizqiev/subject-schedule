<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subject';

    protected $guarded = 'id';
    
    protected $fillable = ['name', 'lecturer'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
