<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\WarehouseManager;
use Illuminate\Http\Request;

class WarehouseManagerController extends Controller
{
    public function nuevoCodigo()
    {
        $ultimoCodigo = WarehouseManager::select('code')->orderBy('id', 'desc')->first();
        if ($ultimoCodigo) {
            $ultimoNumero = intval(substr($ultimoCodigo->code, 3));
            $nuevoNumero = $ultimoNumero + 1;
            $codigo = 'WHM' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
        } else {
            $codigo = 'WHM00001';
        }

        return $codigo;
    }

    public function index()
    {
        $whsManagers = WarehouseManager::with(['employee.user'])
            ->join('employees', 'warehouse_managers.employee_id', '=', 'employees.id')
            ->orderByRaw('CAST(SUBSTRING(employees.code, 4) AS UNSIGNED)')
            ->select('warehouse_managers.*')
            ->paginate(8);
        return view('company.employees.warehouse_managers.index', compact('whsManagers'));
    }

    public function create()
    {
        $newCode = $this->nuevoCodigo();
        return view('company.employees.warehouse_managers.actions.create', compact('newCode'));
    }
}
