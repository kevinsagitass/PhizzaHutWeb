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
})->name('login');

Route::post('/Login', 'LoginController@login');

Route::get('/Register', function () {
    return view('register');
});

Route::post('/Register', 'RegisterController@register');
Route::post('/Login', 'LoginController@login');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/Home', 'HomeController@dashboard');

    Route::get('/Logout', 'LoginController@logout');

    Route::get('/', 'HomeController@dashboard');


    Route::get('/AllUser', 'AdminController@viewAllUser');


    Route::post('/AddPhizza','PhizzaController@add');
    Route::get('/AddPhizza',[function(){
        return view('addphizza');
    }, 'as' => 'add.phizza.form'])->name('addPhizzaForm');

    Route::get('/UpdatePhizza/{phizza_id}','PhizzaController@viewupdate');
    Route::post('/UpdatePhizza/{phizza_id}', 'PhizzaController@update');

});
