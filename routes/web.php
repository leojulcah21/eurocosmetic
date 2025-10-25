<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Employees\SellerController;
use App\Http\Controllers\Employees\WarehouseManagerController;
use App\Http\Controllers\Operations\CategoryController;
use App\Http\Controllers\Operations\WarehouseController;
use App\Http\Controllers\Operations\ProductController;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// =======================================
// RUTAS PROTEGIDAS
// =======================================
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/inventory', [CompanyController::class, 'index'])->name('inventory.index');

        // CRUD de vendedores
        Route::prefix('employees/sellers')->name('employees.sellers.')->group(function () {
            Route::get('/', [SellerController::class, 'index'])->name('index');
            Route::get('/create', [SellerController::class, 'create'])->name('create');
            Route::post('/', [SellerController::class, 'store'])->name('store');
            Route::get('/{seller}/edit', [SellerController::class, 'edit'])->name('edit');
            Route::put('/{seller}', [SellerController::class, 'update'])->name('update');
            Route::delete('/{seller}', [SellerController::class, 'destroy'])->name('destroy');
        });

        // CRUD de jefes de almacen
        Route::prefix('employees/whs_managers')->name('employees.whs-managers.')->group(function () {
            Route::get('/', [WarehouseManagerController::class, 'index'])->name('index');
            Route::get('/create', [WarehouseManagerController::class, 'create'])->name('create');
        });

        // CRUD de almacenes
        Route::prefix('inventory/warehouses')->name('inventory.warehouses.')->group(function () {
            Route::get('/', [WarehouseController::class, 'index'])->name('index');
        });

        // CRUD de categorias
        Route::prefix('inventory/categories')->name('inventory.categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
        });

        // CRUD de productos
        Route::prefix('inventory/products')->name('inventory.products.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
        });
    });


// =======================================
// AUTENTICACIÓN PERSONALIZADA
// =======================================


// Login para clientes
Route::get('/login/client', function () {
    return view('auth.authentication');
})->name('login.client');

Route::get('/register/client', function () {
    return view('auth.authentication');
})->name('register.client');

// Login para admins/empleados
Route::get('/login/company', function () {
    return view('auth.company.login');
})->name('login.company');
