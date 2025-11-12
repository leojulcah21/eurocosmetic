<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusHistory extends Model
{
   public $timestamps = false; // porque ya tienes changed_at

    protected $fillable = [
        'order_id',
        'status',
        'employee_id',
        'changed_at',
        'notes'
    ];

    protected $casts = [
        'changed_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
