<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fontend\viewFactoryController;
use App\Http\Controllers\fontend\pageDetailController;
use App\Http\Controllers\backend\employeeController;
use App\Http\Controllers\backend\factoryController;
use App\Http\Controllers\backend\publicrelationsController;
use App\Http\Controllers\SurveyController;

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
// Route::get('/factory', function () {
//   return view('welcome');
// });

Route::get('/', function () {
  return view('welcome');
});

Route::resource('manage-employee', employeeController::class);
Route::resource('manage-factory', factoryController::class);
Route::resource('manage-survey', surveyController::class);
Route::resource('manage-infomation', publicrelationsController::class);


Route::resource('factory', viewFactoryController::class);
Route::resource('page', pageDetailController::class);
Route::resource('survey',SurveyController::class);
// Route::group(['middleware' => ['checkrole:admin']], function () {

// });


Auth::routes();
