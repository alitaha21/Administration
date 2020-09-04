<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use App\Company;
use App\Employee;
use App\Transformer\EmployeeTransformer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/v1/companies', 'Api\CompaniesController@index')->name('api.companies.index');

Route::namespace('Api')->group(function (){

    Route::get('employees', function (Request $request) {
        return new EmployeeTransformer(Employee::findOrFail($request->id));
    });

    Route::post('login', 'LoginController');

    Route::get('company/all', 'CompanyController@index');
    Route::post('company/add', 'CompanyController@store');
    Route::get('company/{id}', 'CompanyController@show');
    Route::patch('company/{id}/edit', 'CompanyController@update');
    Route::delete('company/{id}/delete', 'CompanyController@destroy');

    // Route::apiResource('company', 'CompanyController');

});