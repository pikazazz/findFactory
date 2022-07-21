<?php

use App\Http\Middleware\checkrole;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fontend\viewFactoryController;
use App\Http\Controllers\fontend\pageDetailController;
use Illuminate\Http\Request;

use App\Http\Controllers\backend\employeeController;
use App\Http\Controllers\backend\factoryController;
use App\Http\Controllers\backend\fanageSurveyController;
use App\Http\Controllers\backend\fublicrelationsController;
use App\Http\Controllers\backend\ManageSurveyController;
use App\Http\Controllers\backend\publicrelationsController;
use App\Http\Controllers\backend\UserProfileController;
use App\Http\Controllers\SurveyController;

use App\Models\Factory;
use App\Models\infomation;
use App\Models\Survey;
use App\Models\User;

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
Route::resource("manage-survey", ManageSurveyController::class)->middleware(['check.factory:123']);;
Route::get('dashboard-data', function (Request $request) {
    $cat = $request->input('cat');
    $name = $request->input('name');
    $factory = (object)[];
    $survey = (object)[];
    $user = (object)[];
    $factories = new Factory();
    $surveys = new Survey();
    $users = new User();
    if ($cat) {
        $factories = $factories::whereRaw("1=?", [$cat == NULL])->orWhere('fac_category', 'like', "%" . $cat . "%");
        $surveys = $surveys::leftJoin('factory', 'factory.id', '=', 'survey.factory')->whereRaw("1=?", [$cat == NULL])->orWhere('fac_category', 'like', "%" . $cat . "%");
        $users = $users::leftJoin('factory', 'factory.id', '=', 'users.factory')->whereRaw("1=?", [$cat == NULL])->orWhere('fac_category', 'like', "%" . $cat . "%");
    }
    if ($name) {
        $factories = $factories::whereRaw("1=?", [$cat == NULL])->orWhere('fac_name', '=', $name);
        $surveys = $surveys::leftJoin('factory', 'factory.id', '=', 'survey.factory')->whereRaw("1=?", [$name == NULL])->orWhere('fac_name', '=', $name);
        $users = $users::leftJoin('factory', 'factory.id', '=', 'users.factory')->whereRaw("1=?", [$name == NULL])->orWhere('fac_name', '=', $name);
    }
    $factory->list = $factories->get();
    $factory->total = $factories->count();
    $survey->list = $surveys->get();
    $survey->total = $surveys->count();
    $user->list = $users->get();
    $user->total = $users->count();
    $data = ['factory' => $factory, 'survey' => $survey, 'user' => $user];
    return json_encode($data);
})->name('dashboard-data');

Route::get('dashboard', function () {
    $factories = Factory::all();
    return view('components.backend.dashboard.index', ['factories' => $factories]);
})->name('dashboard');

// });

// Route::group(['middleware' => ['checkrole:1']], function () {
Route::resource('survey', surveyController::class);
// });

Route::get('infomation', function (Request $request) {
    $id = $request->input('id');
    $info = infomation::find($id);
    return view('components.fontend.page-detail.info', ['info' => $info]);
})->name('infomation');

Route::resource('factory', viewFactoryController::class);
Route::resource('page', pageDetailController::class);

Auth::routes();
