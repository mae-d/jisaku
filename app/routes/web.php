<?php

use App\Http\Controllers\DisplayController;

use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\UserController;

// use App/Http\Controllers\Admin\RegistrationController;



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
    Route::get('/create_game', 'Admin\RegistrationController@creteGameForm')->name('creat.game');
});

Route::group(['middleware' => 'auth:user'], function(){

Route::get('/', [DisplayController::class, 'index'])->name('index');
Route::get('/game/{game}/detail', [DisplayController::class, 'gameDetail'])->name('game.detail');
Route::get('/mypage', [DisplayController::class, 'myPage'])->name('my.page');
Route::get('/create_impression/{id}', [RegistrationController::class, 'createImpressionForm'])->name('create.impression');
Route::post('/create_impression/{id}', [RegistrationController::class, 'createImpression']);
Route::get('/user_edit', [UserController::class, 'userEditForm'])->name('user.edit');
Route::post('/user_edit', [UserController::class, 'userEdit']);
Route::get('/user_softdeleat', [RegistrationController::class, 'userSoftdeleat'])->name('user.softdeleat');
Route::get('/impression_deleat/{id}', [RegistrationController::class, 'impressionDeleat'])->name('impression.deleat');
});