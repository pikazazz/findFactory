<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fontend\ViewFactoryController;
use App\Http\Controllers\fontend\PageDetailController;


use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\FactoryController;
use App\Http\Controllers\backend\ManageSurveyController;
use App\Http\Controllers\backend\PublicrelationsController;
use App\Http\Controllers\backend\UserProfileController;
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

Route::resource('manage-employee', EmployeeController::class);
Route::resource('manage-factory', FactoryController::class);
Route::resource('manage-survey', SurveyController::class);
Route::resource('manage-infomation', PublicrelationsController::class);
Route::resource('manage-profile', UserProfileController::class);



Route::resource('factory', ViewFactoryController::class);
Route::resource('page', PageDetailController::class);
Route::resource('survey', SurveyController::class);
Route::resource("manage-survey", ManageSurveyController::class);
// Route::group(['middleware' => ['checkrole:admin']], function () {

// });


Auth::routes();
