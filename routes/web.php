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

Route::get('/Home', 'HomeController@dashboard');

Route::any('/search', 'HomeController@searchPhizza');

Route::get('/', 'HomeController@dashboard');

Route::get('/PhizzaDetail/{phizza_id}', 'PhizzaController@getPhizzaDetail')->where('phizza_id', '[0-9]+');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/Logout', 'LoginController@logout');

    Route::get('/AllUser', 'AdminController@viewAllUser');

    // Phizza

    Route::post('/AddPhizzaToCart/{phizza_id}', 'PhizzaController@addPhizzatoCart')->where('phizza_id', '[0-9]+');

    Route::post('/AddPhizza','PhizzaController@add');
    Route::get('/AddPhizza',[function(){
        if(Auth::User()->role_id != 1) {
            abort(403);
        }
        return view('addphizza');
    }, 'as' => 'add.phizza.form'])->name('addPhizzaForm');


    Route::get('/EditPhizza/{phizza}', 'PhizzaController@editPhizza')->name('editphizza')->where('phizza_id', '[0-9]+');
    Route::post('/EditPhizza/{phizza_id}', 'PhizzaController@update')->where('phizza_id', '[0-9]+');

    Route::get('/DeletePhizza/{phizza_id}', 'PhizzaController@deletePhizza')->where('phizza_id', '[0-9]+');

    Route::post('/DeletePhizza/{phizza_id}', 'PhizzaController@delete')->where('phizza_id', '[0-9]+');

    // Cart

    Route::get('/UserCart', 'TransactionController@viewCart');

    Route::post('/UpdateCartItem/{item_id}', 'TransactionController@updateCartItemQuantity')->where('item_id', '[0-9]+');

    Route::post('/DeleteCartItem/{item_id}', 'TransactionController@deleteCartItem')->where('item_id', '[0-9]+');

    Route::post('/Checkout/{user_id}', 'TransactionController@CheckoutCart')->where('user_id', '[0-9]+');

    // Transaction

    Route::get('/UserTransaction', 'TransactionController@viewUserTransaction');

    Route::get('/UserTransactionDetail/{transaction_id}', 'TransactionController@viewTransactionDetail')->where('transaction_id', '[0-9]+');
    Route::get('/AllUserTransaction', 'TransactionController@viewAllUserTransaction');

});
