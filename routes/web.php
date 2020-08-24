<?php

// use Illuminate\Http\Request;
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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('company')->name('company.')->group(function() {

    Route::get('/all', 'CompaniesController@index')->name('all');
    Route::get('/display', 'CompaniesController@create')->name('add');
    Route::post('/add', 'CompaniesController@store')->name('store');
    Route::get('/{company}', 'CompaniesController@show')->name('show');
    Route::get('/edit/{company}', 'CompaniesController@edit')->name('edit');
    Route::patch('/edit/{company}', 'CompaniesController@update')->name('update');
    Route::delete('delete/{company}', 'CompaniesController@destroy')->name('delete');
    // Route::get('store/fetch/{id}', 'CompaniesController@fetch')->name('fetch');

});

Route::prefix('employee')->name('employee.')->group(function() {

    Route::get('/all', 'EmployeesController@index')->name('all');
    Route::get('/display', 'EmployeesController@create')->name('add');
    Route::post('/add', 'EmployeesController@store')->name('store');
    Route::get('/{employee}', 'EmployeesController@show')->name('show');
    Route::get('/edit/{employee}', 'EmployeesController@edit')->name('edit');
    Route::patch('/edit/{employee}', 'EmployeesController@update')->name('update');
    Route::delete('delete/{employee}', 'EmployeesController@destroy')->name('delete');

});