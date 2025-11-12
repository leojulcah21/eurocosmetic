<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    const TYPE_SELLER = 'seller';
    const TYPE_WAREHOUSE_MANAGER = 'warehouse_manager';
    const TYPE_COURIER = 'courier';

    protected $fillable = [
        'code',
        'user_id',
        'dni',
        'email',
        'phone',
        'birth_date',
        'employee_type',
        'years_experience',
        'status',
        'hire_date'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function warehouseManager()
    {
        return $this->hasOne(WarehouseManager::class);
    }

    public function courier()
    {
        return $this->hasOne(Courier::class);
    }

    // Validation
    public static function getValidEmployeeTypes()
    {
        return [
            self::TYPE_SELLER,
            self::TYPE_WAREHOUSE_MANAGER,
            self::TYPE_COURIER
        ];
    }
}
