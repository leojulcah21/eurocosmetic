<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MpReference extends Model
{
    protected $fillable = [
        'external_reference',
        'user_id',
        'cart',
        'amount'
    ];

    protected $casts = [
        'cart' => 'array'
    ];
}
