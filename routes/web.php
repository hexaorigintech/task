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
   if( DB::table('users')->count() > 0 )
      return redirect('login');
   return redirect('register');   
      
});


Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers','middleware'=>'auth'],function(){
   Route::get('employees','EmployeesController@index')->name('employees');
   Route::get('employees/{department}','EmployeesController@empByDepartment')->name('departments.employee');
   Route::post('employee/store','EmployeesController@store')->name('employee.store');
   Route::post('employee/update','EmployeesController@update')->name('employee.update');
   Route::get('employee/delete/{id}','EmployeesController@destroy')->name('employee.delete');
   Route::post('importXml','EmployeesController@importXml')->name('import.xml'); 

   Route::get('departments','DepartmentController@index')->name('departments');
   Route::post('department/store','DepartmentController@store')->name('department.store');
   Route::post('department/update','DepartmentController@update')->name('department.update');
   Route::get('department/delete/{id}','DepartmentController@destroy')->name('department.delete');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
