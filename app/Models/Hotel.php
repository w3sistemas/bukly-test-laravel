<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'address',
        'city',
        'state',
        'state',
        'zip_code',
        'website'
    ];
}
