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

Route::post('/wishlist', 'WishlistController@wishlist_up');

Route::get('/News', 'ClassifiedsController@index');

Route::post('/search', 'HomeController@search');

Route::get('/sort_search_property-{type_ark}-{type_home}-{ark}-{sort}', 'HomeController@sort_search_property');

Route::get('/sort_search_property1-{type_ark}-{ark}-{sort}', 'HomeController@sort_search_property1');

Route::get('/sort_search_property2-{type_ark}-{type_home}-{sort}', 'HomeController@sort_search_property2');

Route::get('/sort_search_property3-{type_ark}-{sort}', 'HomeController@sort_search_property3');

Route::get('News/{id}', 'ClassifiedsController@show');

Route::get('/contact_success', function () {
    return view('contact_success');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms_condition', function () {
    return view('terms_condition');
});


Route::get('/contact_us', function () {
    return view('contact');
});



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



Auth::routes();


Route::group(['middleware' => 'admin'], function() {

  Route::resource('admin/dashboard', 'DashboardController');
  Route::resource('admin/user', 'StudentController');
  Route::resource('admin/category', 'CatController');
  Route::resource('admin/property', 'PropertyController');
  Route::post('admin/searchproperty', 'PropertyController@searchproperty');
  Route::get('admin/searchproperty', 'PropertyController@searchproperty');
  Route::post('admin/model_x', 'ProvincesController@exampleModel');
  Route::post('admin/property_image_del', 'PropertyController@property_image_del');
  Route::resource('admin/classifieds', 'BlogController');
  Route::post('admin/file/posts', 'UploadFileController@imagess');


});

Route::group(['middleware' => 'web'], function () {

Route::get('/', 'HomeController@index');
Route::get('/asset-{id}', 'ProductController@show');

});


Route::group(['middleware' => 'auth'], function () {

  Route::resource('comment', 'CommentController');
  });
