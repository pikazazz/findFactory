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
    Route::get('dashboard',function(Request $request){
        $cat = $request->input('cat');
        $factory = (object)[];
        $survey = (object)[];
        $user = (object)[];
        $factories = Factory::whereRaw("1=?",[$cat==NULL])->orWhere('fac_category','=',$cat);
        $surveys = Survey::leftJoin('factory','factory.id','=','survey.factory')->whereRaw("1=?",[$cat==NULL])->orWhere('fac_category','=',$cat);;
        $users = User::leftJoin('factory','factory.id','=','users.factory')->whereRaw("1=?",[$cat==NULL])->orWhere('fac_category','=',$cat);;
        $factory->list = $factories;
        $factory->total = $factories->count();
        $survey->list = $surveys;
        $survey->total = $surveys->count();
        $user->list = $users;
        $user->total = $users->count();
        $data = ['factory'=>$factory, 'survey'=>$survey, 'user'=>$user];
        return view('components.backend.dashboard.index',['data'=>$data]);
    })->name('dashboard');
// });

// Route::group(['middleware' => ['checkrole:1']], function () {
    Route::resource('survey', surveyController::class)->middleware(['check.factory:123']);
// });


Route::resource('factory', viewFactoryController::class);
Route::resource('page', pageDetailController::class);

Auth::routes();
