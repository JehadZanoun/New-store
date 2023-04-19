<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('admin', function () {
//    return view('admin.dashboard');
//});

Route::group(['namespace' => 'Admin','middleware' => 'auth:admin'], function() {
    Route::get('/' , [DashboardController::class,'index']);
});

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function() {

   Route::get('login' , [LoginController::class,'getLogin']);

    Route::post('login' , 'LoginController@Login')->name('admin.login');


});


