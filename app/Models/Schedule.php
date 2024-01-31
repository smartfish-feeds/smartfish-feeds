<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'time',
        'status',
    ];

    public function getTimeAttribute($value)
    {
        return substr($value, 0, 5);
    }
}
