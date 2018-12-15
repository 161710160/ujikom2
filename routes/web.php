<?php

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
Route::get('/', function(){
	return view('frontends.index');
});



Route::get('logout', function (){
    return view('/home');
});

Route::group(['middleware' => ['web', 'auth']], function(){


    Route::resource("users", "UserController");
    Route::get("users/delete", "UserController@delete");
    Route::get('/ajax/categories/search','CategoryController@ajaxSearch');
    Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
    Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
    Route::delete('/categories/{id}/delete-permanent','CategoryController@deletePermanent')->name('categories.delete-permanent');
    Route::resource('categories', 'CategoryController');
    Route::get('/produks/trash', 'ProdukController@trash')->name('produks.trash');
    Route::post('/produks/{id}/restore', 'ProdukController@restore')->name('produks.restore');
    Route::delete('/produks/{id}/delete-permanent',
    'ProdukController@deletePermanent')->name('produks.delete-permanent');
    Route::resource('produks', 'ProdukController');
    Route::resource('orders', 'OrderController');
    Route::resource('checkouts', 'CheckoutController');
    Route::resource('carts', 'CartController');

    Route::get('/home', function(){
        if (Auth::user()->admin == 0){
            return view('frontends.index');
        }else {
            $users['users'] = \App\User::all();
            return view('layouts.global', $users);
        }
    });
    Route::get('/home', function(){
        if (Auth::user()->admin == 0){
            return view('frontends.index');
        }else {
            $users['users'] = \App\User::all();
            return view('layouts.global', $users);
        }
    });
    Route::get('/homeadmin', function () {
        return view('homeadmin');
    });
    
    

});



//route frontend
Route::get('/about', function () {
    return view('frontends.about');
});
Route::get('/cart', function () {
    return view('frontends.cart');
});
Route::get('/checkout', function () {
    return view('frontends.checkout');
});
Route::get('/contact', function () {
    return view('frontends.contact');
});
Route::get('index', function () {
    return view('frontends.index');
});
Route::get('/detailproduk', function () {
    return view('frontends.detailproduk');
});
Route::get('/shop', function () {
    return view('frontends.shop');
});
Route::get('/thankyou', function () {
    return view('frontends.thankyou');
});
Route::get('/login-register', function () {
    return view('frontends.login-register');
});
