<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_PEDING_REVIEW = 'pending_review';
    const STATUS_APPROVED = 'approved';
    const STATUS_AWAITING_WAREHOUSE = 'awaiting_warehouse';
    const STATUS_READY_FOR_DELIVERY = 'ready_for_delivery';
    const STATUS_ON_DELIVERY = 'on_delivery';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'code',
        'customer_id',
        'address_id',
        'order_date',
        'status',
        'total_amount',
        'seller_id',
        'warehouse_manager_id',
        'courier_id'
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function warehouseManager()
    {
        return $this->belongsTo(WarehouseManager::class);
    }

    public function courier()
    {
       return $this->belongsTo(Courier::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentMp()
    {
        return $this->hasOne(PaymentMp::class);
    }

    // Validation
    public static function getValidStatuses()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_PEDING_REVIEW,
            self::STATUS_APPROVED,
            self::STATUS_AWAITING_WAREHOUSE,
            self::STATUS_READY_FOR_DELIVERY,
            self::STATUS_ON_DELIVERY,
            self::STATUS_DELIVERED,
            self::STATUS_CANCELLED,
        ];
    }
}
