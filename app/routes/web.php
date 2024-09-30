<?php

use App\Http\Controllers\DisplayController;

use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\admin_RegistrationController;

use App\Http\Controllers\ImageUploadController;

use App\Http\Controllers\LikeController;



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

Auth::routes();

Route::prefix('admin')
->group(function () {
    Route::get('/login', 'Admin\LoginController@loginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login');
});

Route::prefix('admin')
->middleware('auth:admin')
->group(function () {
    Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/user/{id}/detail', 'Admin\HomeController@userDetail')->name('user.detail');
    Route::get('/create_game', 'admin_RegistrationController@createGameForm')->name('create.game');
    Route::post('/create_game', 'admin_RegistrationController@createGame');
    Route::get('/user_delete/{id}', 'admin_RegistrationController@userDelete')->name('user.delete');
});


Route::group(['middleware' => 'auth:user'], function(){

Route::get('/', [DisplayController::class, 'index'])->name('index');
Route::get('/game/{game}/detail', [DisplayController::class, 'gameDetail'])->name('game.detail');
Route::get('/mypage', [DisplayController::class, 'myPage'])->name('my.page');
Route::get('/create_impression/{id}', [RegistrationController::class, 'createImpressionForm'])->name('create.impression');
Route::post('/create_impression/{id}', [RegistrationController::class, 'createImpression']);
Route::get('/user_edit', [UserController::class, 'userEditForm'])->name('user.edit');
Route::post('/user_edit', [UserController::class, 'userEdit']);
Route::get('/mydata_deletecomfirm', [UserController::class, 'mydataDeleteConfirm'])->name('mydata.deleteconfirm');
Route::get('/mydata_delete', [UserController::class, 'mydataDelete'])->name('mydata.delete');
Route::get('/impression_deleat/{id}', [RegistrationController::class, 'impressionDeleat'])->name('impression.deleat');
Route::get('/create', [ImageUploadController::class, 'create'])->name('create');
Route::post('/image_upload', [ImageUploadController::class, 'store'])->name('image_upload');
Route::get('/images', [ImageUploadController::class, 'images'])->name('images');
Route::post('/like/{commentId}',[LikeController::class,'store']);


});