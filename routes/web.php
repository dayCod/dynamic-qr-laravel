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
require __DIR__ . '/errors.php';

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
        Route::post('/create', [EmployeeController::class, 'createEmployee'])->name('dashboard.employee.store');
        Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('dashboard.employee.edit');
        Route::put('/{employee}', [EmployeeController::class, 'updateEmployee'])->name('dashboard.employee.update');
        Route::delete('/{employee}/destroy', [EmployeeController::class, 'deleteEmployee'])->name('dashboard.employee.destroy');
    }); //end route

    Route::prefix('/qr')->group(function() {
        Route::get('/', [QRController::class, 'index'])->name('dashboard.qr.index');
        Route::get('/create', [QRController::class, 'create'])->name('dashboard.qr.create');
        Route::post('/create', [QRController::class, 'createQR'])->name('dashboard.qr.store');
        Route::get('/{qr}/edit', [QRController::class, 'edit'])->name('dashboard.qr.edit');
        Route::put('/{qr}', [QRController::class, 'updateQR'])->name('dashboard.qr.update');
        Route::delete('/{qr}/destroy', [QRController::class, 'deleteQR'])->name('dashboard.qr.destroy');
    }); //end route
});

Route::group(['prefix' => 'qr'], function () {
    Route::get('/short/{url_key}/{id}', [QRController::class, 'qrProccessing'])->name('qr.process');
});
