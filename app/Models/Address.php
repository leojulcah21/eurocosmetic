<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'client_id',
        'ubigeo_id',
        'address_detail',
        'reference',
        'is_primary'
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function location()
    {
        return $this->belongsTo(Ubigeo::class);
    }
}
