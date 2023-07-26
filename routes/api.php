<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/notebook', [Controller::class, 'all_client']);
Route::post('/v1/notebook', [Controller::class, 'add_client']);
Route::get('/v1/notebook/{id}', [Controller::class, 'id_client']);
Route::delete('/v1/notebook/{id}', [Controller::class, 'delete_client']);
Route::patch('/v1/notebook/{id}', [Controller::class, 'edit_client']);
