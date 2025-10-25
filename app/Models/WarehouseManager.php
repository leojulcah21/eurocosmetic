<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'employee_id',
        'warehouse_id',
        'area',
        'years_experience',
        'notes'
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
