<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoAppController;

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

Route::get('/', 'TodoAppController@index');
Route::get('create', 'TodoAppController@create');
Route::get('details/{todo}', 'TodoAppController@details');
Route::get('details/edit/{todo}', 'TodoAppController@edit');
Route::post('update/{todo}', 'TodoAppController@update');
Route::get('details/delete/{todo}', 'TodoAppController@delete');
Route::post('store-data', 'TodoAppController@store');