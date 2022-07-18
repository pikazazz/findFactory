<?php

use App\Http\Middleware\checkrole;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fontend\viewFactoryController;
use App\Http\Controllers\fontend\pageDetailController;


use App\Http\Controllers\backend\employeeController;
use App\Http\Controllers\backend\factoryController;
use App\Http\Controllers\backend\fanageSurveyController;
use App\Http\Controllers\backend\fublicrelationsController;
use App\Http\Controllers\backend\ManageSurveyController;
use App\Http\Controllers\backend\publicrelationsController;
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



// Route::group(['middleware' => ['checkrole:0']], function () {
    Route::resource('manage-employee', employeeController::class);
    Route::put('manage-employee/m/{id}', [factoryController::class, 'updateFac'])->name('manage-factory.updateFac');
    Route::resource('manage-factory', factoryController::class);
    Route::put('manage-factory/m/{id}', [factoryController::class, 'updateFac'])->name('manage-factory.updateFac');
    Route::resource('manage-survey', SurveyController::class);
    Route::resource('manage-infomation', publicrelationsController::class);
    Route::resource('manage-profile', userProfileController::class);
    Route::resource("manage-survey", ManageSurveyController::class);
    Route::get('dashboard',function(){
        return view('components.backend.dashboard.index');
    })->name('dashboard');
// });

// Route::group(['middleware' => ['checkrole:1']], function () {
    Route::resource('survey', surveyController::class);
// });


Route::resource('factory', viewFactoryController::class);
Route::resource('page', pageDetailController::class);

Auth::routes();
