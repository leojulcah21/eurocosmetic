<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Employee;
use App\Models\Seller;
use App\Http\Requests\Employees\Seller\StoreRequest as StoreSellerRequest;
use App\Http\Requests\Employees\Seller\UpdateRequest as UpdateSellerRequest;
use App\Helpers\CodeGenerator;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::with(['employee.user'])
            ->join('employees', 'sellers.employee_id', '=', 'employees.id')
            ->orderByRaw('CAST(SUBSTRING(employees.code, 4) AS UNSIGNED)')
            ->select('sellers.*')
            ->paginate(8);

        return view('company.employees.sellers.index', compact('sellers'));
    }

    public function create()
    {
        $newCode = CodeGenerator::generate('sellers', 'VND');
        return view('company.employees.sellers.actions.create', compact('newCode'));
    }

    public function store(StoreSellerRequest $request)
    {
        try {
            $codeEmp = CodeGenerator::generate('employees', 'EMP');
            $codeSeller = CodeGenerator::generate('sellers', 'VND');

            DB::transaction(function () use ($request, $codeEmp, $codeSeller) {
                // Crear usuario
                $user = User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role_id' => Role::where('name', 'seller')->first()->id ?? 3,
                    'status' => 'active',
                ]);

                // Crear empleado
                $employee = Employee::create([
                    'code' => $codeEmp,
                    'user_id' => $user->id,
                    'dni' => $request->dni,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'birth_date' => $request->birth_date,
                    'employee_type' => 'seller',
                ]);


                // Crear vendedor
                Seller::create([
                    'code' => $codeSeller,
                    'employee_id' => $employee->id,
                    'line' => $request->line,
                    'notes' => $request->notes,
                    'years_experience' => $request->years_experience ?? 0,
                ]);
            });

            return redirect()->route('company.employees.sellers.index')
                ->with('success', 'Vendedor registrado correctamente.');
        } catch (\Throwable $e) {
            return redirect()->back()
                ->with('error', 'Ocurrió un error al registrar el vendedor: ' . $e->getMessage());
        }
    }

    public function edit(Seller $seller)
    {
        $seller->load(['employee.user']);
        return view('company.employees.sellers.actions.edit', compact('seller'));
    }

    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        try {
            DB::transaction(function () use ($request, $seller) {
                $user = $seller->employee->user;
                $employee = $seller->employee;

                $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                ]);

                $employee->update([
                    'dni' => $request->dni,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'birth_date' => $request->birth_date,
                ]);

                $seller->update([
                    'line' => $request->line,
                    'notes' => $request->notes,
                    'years_experience' => $request->years_experience ?? 0,
                ]);
            });

            return redirect()->route('company.employees.sellers.index')
                ->with('success', 'Datos actualizados correctamente.');
        } catch (\Throwable $e) {
            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar los datos: ' . $e->getMessage());
        }
    }

    public function destroy(Seller $seller)
    {
        try {
            DB::transaction(function () use ($seller) {
                $deletedNumber = intval(substr($seller->code, 3));

                $seller->employee->user->delete();
                $seller->employee->delete();
                $seller->delete();

                $siguientes = Seller::whereRaw('CAST(SUBSTRING(code, 4) AS UNSIGNED) > ?', [$deletedNumber])
                    ->orderBy('id')
                    ->get();

                foreach ($siguientes as $registro) {
                    $numeroActual = intval(substr($registro->code, 3));
                    $nuevoNumero = $numeroActual - 1;
                    $nuevoCodigo = 'VND' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
                    $registro->update(['code' => $nuevoCodigo]);
                }
            });

            return redirect()
                ->route('company.employees.sellers.index', ['page' => 1])
                ->with('success', 'Vendedor eliminado correctamente.');
        } catch (\Throwable $e) {
            return redirect()
                ->route('company.employees.sellers.index')
                ->with('error', 'Ocurrió un error al eliminar el vendedor: ' . $e->getMessage());
        }
    }
}
