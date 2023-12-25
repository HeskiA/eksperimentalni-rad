<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Region2 extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $fillable = [
        'region_name'
    ];
}
