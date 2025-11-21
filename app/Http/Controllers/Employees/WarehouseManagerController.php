<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\WarehouseManager;
use Illuminate\Http\Request;
use App\Helpers\CodeGenerator;

class WarehouseManagerController extends Controller
{
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
        $newCode = CodeGenerator::generate('warehouse_managers', 'WHM');
        return view('company.employees.warehouse_managers.actions.create', compact('newCode'));
    }
}
