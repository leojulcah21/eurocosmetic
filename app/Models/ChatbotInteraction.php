<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotInteraction extends Model
{
    use HasFactory;

    const TYPE_PRODUCT_QUERY = 'product_query';
    const TYPE_PAYMENT_QUERY = 'payment_query';
    const TYPE_ORDER_HELP = 'order_help';
    const TYPE_OTHER = 'other';

    protected $fillable = [
        'code',
        'customer_id',
        'interaction_date',
        'interaction_type',
        'user_message',
        'bot_response'
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Validation
    public static function getValidInteractionTypes()
    {
        return [
            self::TYPE_PRODUCT_QUERY,
            self::TYPE_PAYMENT_QUERY,
            self::TYPE_ORDER_HELP,
            self::TYPE_OTHER,
        ];
    }
}
