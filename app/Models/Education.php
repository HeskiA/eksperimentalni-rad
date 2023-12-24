<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'school_name',
        'start',
        'end'
    ];

    protected $table = 'educations';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
