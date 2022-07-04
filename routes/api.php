<?php

use App\Http\Controllers\Admin\SystemLogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\API\NewImageDelete;
use App\Http\Controllers\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::resource('userGroups', UserGroupController::class);
Route::resource('users',UserController::class);
Route::resource('news',NewsController::class);
Route::resource('categories',CategorieController::class);
Route::resource('categorie',CategorieController::class);
Route::resource('systemLogs', SystemLogController::class);



