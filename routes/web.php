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
    return view('welcome');
});

Route::get('/k','klist@show');
Route::get('/k2','klist@show2');
Route::get('/k3','klist@show3');

Route::get('/formtest','klist@formshow')->name('.forminsertx');
Route::post('/formtest','klist@formtest')->name('.forminsert');

/* BackendController */
include base_path('routes/backend/backend.php');
