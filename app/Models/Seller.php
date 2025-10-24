<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'employee_id', 'line', 'notes', 'years_experience'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (!$model->code) {
    //             $ultimoCodigo = self::select('code')->orderBy('id', 'desc')->first();
    //             if ($ultimoCodigo) {
    //                 $ultimoNumero = intval(substr($ultimoCodigo->code, 3));
    //                 $nuevoNumero = $ultimoNumero + 1;
    //                 $model->code = 'VND' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
    //             } else {
    //                 $model->code = 'VND00001';
    //             }
    //         }
    //     });

    //     static::deleted(function ($model) {
    //         DB::transaction(function () use ($model) {
    //             $deletedNumber = intval(substr($model->code, 3));

    //             DB::update("UPDATE sellers SET code = CONCAT('VND', LPAD(CAST(SUBSTRING(code,4) AS UNSIGNED) - 1, 5, '0')) WHERE CAST(SUBSTRING(code,4) AS UNSIGNED) > ?", [$deletedNumber]);
    //         });
    //     });
    // }

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
