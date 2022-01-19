<?php

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

Route::get('/', function () {
    return redirect('login');
})->middleware('checkUser');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employees');
    Route::get('employees/{department}', [App\Http\Controllers\EmployeesController::class, 'empByDepartmentindex'])->name('departments.employee');
    Route::post('employee/store', [App\Http\Controllers\EmployeesController::class, 'store'])->name('employee.store');
    Route::post('employee/update', [App\Http\Controllers\EmployeesController::class, 'update'])->name('employee.update');
    Route::get('employee/delete/{id}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('employee.delete');
    Route::post('importXml', [App\Http\Controllers\EmployeesController::class, 'importXml'])->name('import.xml');

    Route::get('departments', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departments');
    Route::post('department/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('department.store');
    Route::post('department/update', [App\Http\Controllers\DepartmentController::class, 'update'])->name('department.update');
    Route::get('department/delete/{id}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('department.delete');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
