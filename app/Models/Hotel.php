<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
