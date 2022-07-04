<?php


use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\SystemLogController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\HeaderController;
use App\Http\Controllers\Frontend\DetailNewsController;
use App\Http\Controllers\Frontend\CommentsController;
use App\Http\Controllers\Frontend\NewsletersController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'prefix' => 'administrator',
    'middleware' => ['auth']
], function () {

    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard.index');

    Route::prefix('userGroups')->group(function () {
        Route::get('/trash', [UserGroupController::class, 'trashedItems'])->name('userGroups.trash');
        Route::delete('/force_destroy/{id}', [UserGroupController::class, 'force_destroy'])->name('userGroups.force_destroy');
        Route::get('/restore/{id}', [UserGroupController::class, 'restore'])->name('userGroups.restore');
    });

    Route::prefix('users')->group(function () {
        Route::get('/trash', [UserController::class, 'trashedItems'])->name('users.trash');
        Route::get('/export', [UserController::class, 'export'])->name('users.export');
        Route::delete('/force_destroy/{id}', [UserController::class, 'force_destroy'])->name('users.force_destroy');
        Route::get('/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    });

    Route::prefix('news')->group(function () {
        Route::get('/trash', [NewsController::class, 'trashedItems'])->name('news.trash');
        Route::delete('/force_destroy/{id}', [NewsController::class, 'force_destroy'])->name('news.force_destroy');
        Route::get('/restore/{id}', [NewsController::class, 'restore'])->name('news.restore');
    });


    Route::resource('news', NewsController::class);
    Route::resource('users', UserController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('email', EmailController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('userGroups', UserGroupController::class);
    Route::resource('systemLogs', SystemLogController::class);


    Route::delete('/testdelete', [EmailController::class,'test'])->name('test');

});

Route::post('/approved', [CommentController::class, 'approved']);

Route::get('/website', function () {
    return view('frontend.home.index');
})->name('website.home');
Route::get('/detailNews', function () {
    return view('frontend.home.detailNews');
})->name('website.detailNews');


// Route::get('/website', function () {
//     return view('frontend.home.index');
// })->name('website.home');
// Route::get('/detailNews', function () {
//     return view('frontend.home.detailNews');
// })->name('website.detailNews');

Route::get('/detailNews', [DetailNewsController::class, 'index'])->name('website.detailNews');
Route::get('/home', [HomeController::class, 'index'])->name('website.home');
Route::get('/search', [HomeController::class, 'search'])->name('website.search');
Route::get('/categories/{id}', [HomeController::class, 'categories'])->name('website.categories');
Route::get('/header', [HomeController::class, 'header'])->name('website.header');
Route::get('/topHeader', [HomeController::class, 'topHeader'])->name('website.topHeader');
Route::get('/detailNews/{id}', [HomeController::class, 'show'])->name('website.detailNews');
Route::post('/load-comment', [CommentsController::class,'load_comment']);
Route::post('/send-comment', [CommentsController::class,'send_comment']);
Route::post('/addNewsleters', [NewsletersController::class,'addNewsleters']);


Route::get('administrator/login', [AuthController::class, 'login'])->name('login');
Route::post('administrator/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('administrator/logout', [AuthController::class, 'logout'])->name('logout');



