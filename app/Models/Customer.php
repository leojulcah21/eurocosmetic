<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    const PROPERTY_OWNED = 'owned';
    const PROPERTY_RENTED = 'rented';

    protected $fillable = [
        'code',
        'user_id',
        'dni',
        'phone',
        'has_salon',
        'salon_address',
        'property_type',
        'last_purchase_receipts',
        'business_name',
        'birth_date'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function chatbotInteractions()
    {
        return $this->hasMany(ChatbotInteraction::class);
    }

    // Validation
    public static function getValidPropertyTypes()
    {
        return [self::PROPERTY_OWNED, self::PROPERTY_RENTED];
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'has_salon' => 'boolean'
        ];
    }
}
