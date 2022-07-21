<?php

use App\Models\factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

class Map
{
    public $name;
    public $lat;
    public $lon;
}

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::GET('fillterFactory', function (Request $request) {

    $result = DB::table('factory')
        ->where(function ($query) use ($request) {
            $query->Where('fac_name', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->Where('fac_category', 'LIKE', '%' . $request->text . '%');
        })->get();

    $Map  = new Map();
    $Data = new ArrayObject();
    $factory = factory::get();
    foreach ($factory as $Factory) {
        $Map->name = $Factory->fac_name;
        $Map->lat = $Factory->fac_lat;
        $Map->lon = $Factory->fac_lon;
        $Data->append(["name" => $Factory->fac_name, "lat" => $Factory->fac_lat, "lon" => $Factory->fac_lon]);
    }

    // return $result;
    return ['factory' => $result,'map'=>$factory];
});
