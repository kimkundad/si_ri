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





Route::get('/category', function () {
    return view('category');
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::group(['middleware' => 'admin'], function() {

  Route::get('admin/profile', function () {
    return 'wefewfwef';
  });
    //Route::resource('admin/profile', 'PostTypeController');

    //space_type
});

Auth::routes();

Route::group(['middleware' => 'web'], function () {

Route::get('/', 'HomeController@index');
Route::get('/asset-{id}', 'ProductController@show');

});
