<?php

use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\CompanyController;
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

Route::prefix('cms/admin')->group(function(){
    Route::resource('companies', CompanyController::class);
    Route::post('companies_update/{id}',[CompanyController::class,'update']);

    Route::resource('company_branches', CompanyBranchController::class);
    Route::post('company_branches_update/{id}',[CompanyBranchController::class,'update']);


});
Route::prefix('cms/')->middleware('guest:company')->group(function(){
    Route::get('{guard}/login' , [CompanyAuthController::class , 'showLogin'])->name('view.login');
    Route::post('{guard}/login' , [CompanyAuthController::class , 'login']);
});