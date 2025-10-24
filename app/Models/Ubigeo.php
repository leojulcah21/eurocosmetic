<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;

    protected $table = 'ubigeo';

    protected $fillable = [
        'code',
        'department',
        'province',
        'district'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
