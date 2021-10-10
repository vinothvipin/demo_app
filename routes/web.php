<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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


 

Route::group(['middleware' => 'auth'], function () {
    Route::resource('company', CompanyController::class);
     Route::resource('employees', EmployeeController::class);

    Route::get('/dashboard', function () {
         return view('dashboard');
            })->name('dashboard');
    Route::get('/', function () {
    return redirect()->route('dashboard');
});

});
