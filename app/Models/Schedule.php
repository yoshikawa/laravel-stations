<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $dates = [
        'start_time',
        'end_time'
    ];

    public function BelongMovie()
    {
        return $this->belongsTo(Movie::class);
    }
}
