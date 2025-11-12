<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function departamento()
    {
        return $this->belongsTo(Departament::class, 'departament_id');
    }
}
