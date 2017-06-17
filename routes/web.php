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



/*Route::get('/', function () {
    return view('error');
});*/


Route::get('/property-{type}-{rent}', 'CategoryController@property');
Route::get('/sort_property-{type}-{rent}-{sort}', 'CategoryController@sort_property');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::post('/contact', 'ContactController@store');

Route::get('/classifieds_siri', 'ClassifiedsController@index');

Route::get('classifieds_siri/{id}', 'ClassifiedsController@show');

Route::get('/contact_success', function () {
    return view('contact_success');
});


Route::get('/about', function () {
    return view('about');
});


Route::get('/contact_us', function () {
    return view('contact');
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


Route::group(['middleware' => 'auth'], function () {

  Route::resource('comment', 'CommentController');
  });
