<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'employee_id',
        'line',
        'notes',
        'years_experience'
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
