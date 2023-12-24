<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'url'
    ];

    protected $table = 'contactinfos';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
