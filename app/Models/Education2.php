<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Education2 extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $fillable = [
        'user_id',
        'school_name',
        'start',
        'end'
    ];

}
