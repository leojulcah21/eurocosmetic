<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Employees\SellerController;
use App\Http\Controllers\Employees\WarehouseManagerController;
use App\Http\Controllers\Operations\CategoryController;
use App\Http\Controllers\Operations\WarehouseController;
use App\Http\Controllers\Operations\ProductController;
use App\Http\Controllers\Operations\OrderController;

// ========================================
// ADMIN
// ========================================
Route::middleware(['role:Administrator'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/inventory', [CompanyController::class, 'inventory'])->name('inventory.index');

    Route::prefix('employees/sellers')->name('employees.sellers.')->group(function () {
        Route::get('/', [SellerController::class, 'index'])->name('index');
        Route::get('/create', [SellerController::class, 'create'])->name('create');
        Route::post('/', [SellerController::class, 'store'])->name('store');
        Route::get('/{seller}/edit', [SellerController::class, 'edit'])->name('edit');
        Route::put('/{seller}', [SellerController::class, 'update'])->name('update');
        Route::delete('/{seller}', [SellerController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('employees/whs_managers')->name('employees.whs-managers.')->group(function () {
        Route::get('/', [WarehouseManagerController::class, 'index'])->name('index');
        Route::get('/create', [WarehouseManagerController::class, 'create'])->name('create');
    });

    Route::prefix('inventory/warehouses')->name('inventory.warehouses.')->group(function () {
        Route::get('/', [WarehouseController::class, 'index'])->name('index');
    });

    Route::prefix('inventory/categories')->name('inventory.categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
    });

    Route::prefix('inventory/products')->name('inventory.products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
    });
});
