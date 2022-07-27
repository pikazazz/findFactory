<?php

use App\Models\factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
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

Route::GET('fillterFactory', function (Request $request) {
  $result = factory::Where('fac_name', 'LIKE', '%' . $request->text . '%')->orWhere('fac_category', 'LIKE', '%' . $request->text . '%')->get();
  $factory =  factory::get();
  return ['factory' => $result, 'map' => $factory];
});
