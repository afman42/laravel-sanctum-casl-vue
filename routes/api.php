<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return [
    'user' => $request->user(),
    'allPermissions' => auth()->user()->allPermissions()->pluck('name')->map(function($permission){
      return explode('-',$permission);
    })->toArray(),
  ];
});

Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);
