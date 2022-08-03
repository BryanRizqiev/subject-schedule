<?php

namespace App\Models;

use App\Enums\Campus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    protected $with = ['subject'];
    
    protected $fillable = ['subject_id', 'class_id', 'location', 'date', 'date_day', 'type' ,'description'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
