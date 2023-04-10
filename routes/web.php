<?php

use App\Http\Controllers\Dashboard\Department\DepartmentController;
use App\Http\Controllers\Dashboard\Employee\EmployeeController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\QR\QRController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

Route::group([
    'prefix' => '/',
    'middleware' => ['auth'],
], function() {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard.index');

    Route::prefix('/department')->group(function() {
        Route::get('/', [DepartmentController::class, 'index'])->name('dashboard.department.index');
        Route::get('/trash', [DepartmentController::class, 'trash'])->name('dashboard.department.trash');
        Route::get('/create', [DepartmentController::class, 'create'])->name('dashboard.department.create');
        Route::post('/create', [DepartmentController::class, 'createDepartment'])->name('dashboard.department.store');
        Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('dashboard.department.edit');
        Route::put('/{department}', [DepartmentController::class, 'updateDepartment'])->name('dashboard.department.update');
        Route::delete('/{department}/destroy', [DepartmentController::class, 'deleteDepartment'])->name('dashboard.department.destroy');
    }); //end route

    Route::prefix('/employee')->group(function() {
        Route::get('/', [EmployeeController::class, 'index'])->name('dashboard.employee.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('dashboard.employee.create');
        Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('dashboard.employee.edit');
    }); //end route

    Route::prefix('/qr')->group(function() {
        Route::get('/', [QRController::class, 'index'])->name('dashboard.qr.index');
        Route::get('/create', [QRController::class, 'create'])->name('dashboard.qr.create');
        Route::get('/{qr}/edit', [QRController::class, 'edit'])->name('dashboard.qr.edit');
    }); //end route
});
