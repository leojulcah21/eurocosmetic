<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMp extends Model
{
    use HasFactory;

    const STATUS_APPROVED = 'approved';
    const STATUS_PENDING = 'pending';
    const STATUS_REJECTED = 'rejected';
    const STATUS_CANCELLED = 'cancelled';

    protected $table = 'payments_mp';

    protected $fillable = [
        'code',
        'order_id',
        'mp_transaction_id',
        'amount',
        'payment_date',
        'payment_status',
        'payment_method'
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Validation
    public static function getValidStatuses()
    {
        return [
            self::STATUS_APPROVED,
            self::STATUS_PENDING,
            self::STATUS_REJECTED,
            self::STATUS_CANCELLED,
        ];
    }
}
