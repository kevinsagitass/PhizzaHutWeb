<?php

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

Route::get('/Login', function () {
    return view('login');
});

Route::get('/Logout', 'LoginController@logout');

Route::get('/', 'HomeController@dashboard');

Route::get('/Home', 'HomeController@dashboard');

Route::group(['middleware' => ['web']], function () {

    Route::get('/Register', function () {
        return view('register');
    });

    Route::post('/Register', 'RegisterController@register');

    Route::post('/Login', 'LoginController@login');
});
