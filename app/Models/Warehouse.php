<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'code',
        'name',
        'capacity'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function staff() {
        return $this->hasMany(WarehouseManager::class);
    }
}
