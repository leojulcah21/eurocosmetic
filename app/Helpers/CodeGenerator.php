<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class CodeGenerator
{
    /**
     * Genera un nuevo código secuencial basado en la tabla y prefijo dados.
     *
     * @param string $table Nombre de la tabla (por ejemplo, 'employees')
     * @param string $prefix Prefijo del código (por ejemplo, 'EMP')
     * @param int $padLength Cantidad de dígitos que llevará el número (por defecto 5)
     * @param string $column Nombre de la columna donde se guarda el código (por defecto 'code')
     * @return string Código generado (por ejemplo, 'EMP00001')
     */
    public static function generate(string $table, string $prefix, int $padLength = 5, string $column = 'code'): string
    {
        // Busca el último código registrado en esa tabla
        $lastRecord = DB::table($table)
            ->where($column, 'like', $prefix . '%')
            ->orderBy($column, 'desc')
            ->value($column);

        if (!$lastRecord) {
            $nextNumber = 1;
        } else {
            // Extrae la parte numérica del código (después del prefijo)
            $numberPart = (int) substr($lastRecord, strlen($prefix));
            $nextNumber = $numberPart + 1;
        }

        // Genera el nuevo código con ceros a la izquierda
        $newCode = $prefix . str_pad($nextNumber, $padLength, '0', STR_PAD_LEFT);

        return $newCode;
    }
}
