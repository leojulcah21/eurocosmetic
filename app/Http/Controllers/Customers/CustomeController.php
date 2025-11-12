<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Customer;
use App\Models\Departament;
use App\Models\Province;
use App\Models\District;
use App\Models\Address;
use Carbon\Carbon;

class CustomeController extends Controller {
    public function setup() {
        /** @var User $user */
        $user = Auth::user();

        // si ya tiene perfil de cliente, redirige
        if ($user->customer) {
            return redirect()->route('customer.setup');
        }

        // cargamos los datos necesarios para los selects
        $departamentos = Departament::orderBy('name')->get(['id', 'name']);
        $provincias = Province::orderBy('name')->get(['id', 'name', 'departament_id']);
        $distritos = District::orderBy('name')->get(['id', 'name', 'province_id']);

        // pasamos todo a la vista
        return view('customer.setup', [
            'user' => $user,
            'departamentos' => $departamentos,
            'provincias' => $provincias,
            'distritos' => $distritos,
        ]);
    }

    public function store(Request $request) {
        // Normalizamos la fecha antes de validar
        if ($request->filled('birth_date')) {
            try {
                $request->merge([
                    'birth_date' => Carbon::createFromFormat('d/m/Y', $request->birth_date)->format('Y-m-d'),
                ]);
            } catch (\Exception $e) {
                // Si falla el parseo (por formato incorrecto)
                return back()
                    ->withErrors(['birth_date' => 'El formato de la fecha no es válido.'])
                    ->withInput();
            }
        }
        $request->validate([
            'dni' => 'required|string|max:15|unique:customers,dni',
            'phone' => 'required|string|max:20',
            'birth_date' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')
            ],
            'district_id' => 'required|exists:districts,id',
            'address_detail' => 'required|string|max:255',
            'property_type' => 'required|in:owned,rented',
            'business_name' => 'required|string|max:100|unique:customers,business_name',
        ]);

        $user = Auth::user();

        // Evita crear múltiples perfiles por usuario
        if ($user->customer) {
            return redirect()->route('home')->with('info', 'Ya tienes un perfil registrado.');
        }

        // Generar un código único para el cliente (asegurando que no exista)
        do {
            $code = rand(10000, 99999);
        } while (Customer::where('code', $code)->exists());

        // Crear cliente
        $customer = Customer::create([
            'code' => $code,
            'user_id' => $user->id,
            'dni' => $request->dni,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'business_name' => $request->business_name,
            'property_type' => $request->property_type,
        ]);

        // Crear dirección principal
        Address::create([
            'customer_id' => $customer->id,
            'district_id' => $request->district_id,
            'address_detail' => $request->address_detail,
            'reference' => $request->reference,
            'is_primary' => true,
        ]);

        return redirect()->route('home')->with('success', 'Tu perfil ha sido completado correctamente.');
    }

    public function info(Customer $customer) {
        $customer->load(['customer.user']);
    }

    public function orders(Customer $customer) {
        $customer->load(['customer.orders']);
    }

    public function salon(Customer $customer) {
        $customer->load(['customer.addresses']);
    }
}
