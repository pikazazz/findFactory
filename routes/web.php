<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fontend\viewFactoryController;
use App\Http\Controllers\fontend\pageDetailController;
use App\Http\Controllers\backend\dashBoradCOntroller;
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
Route::get('/factory', function () {
  return view('welcome');
});

Route::get('/', function () {
  return view('welcome');
});

Route::resource('dashboard', dashBoradCOntroller::class);

Route::resource('factory', viewFactoryController::class);
Route::resource('page', pageDetailController::class);

// Route::group(['middleware' => ['checkrole:admin']], function () {

// });


Auth::routes();
