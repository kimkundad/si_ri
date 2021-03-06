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

Route::post('/contact_2', 'ContactController@contact_2');
Route::post('/contact_refer', 'ContactController@refer');

Route::get('/siri_recommend', 'CategoryController@siri_recommend');
Route::get('/recent_updates', 'CategoryController@recent_updates');
Route::get('/typeahead', 'HomeController@typeahead');


Route::post('/wishlist', 'WishlistController@wishlist_up');

Route::get('/News', 'ClassifiedsController@index');

Route::get('/search', 'HomeController@search');
Route::get('/404', 'HomeController@error_page');
Route::get('search/data', 'HomeController@search_data');


Route::get('/sort_search_property-{type_ark}-{type_home}-{ark}-{sort}', 'HomeController@sort_search_property');

Route::get('/sort_search_property1-{type_ark}-{ark}-{sort}', 'HomeController@sort_search_property1');

Route::get('/sort_search_property2-{type_ark}-{type_home}-{sort}', 'HomeController@sort_search_property2');

Route::get('/sort_search_property3-{type_ark}-{sort}', 'HomeController@sort_search_property3');

Route::get('News/{id}', 'ClassifiedsController@show');

Route::get('/contact_success', function () {
    return view('contact_success');
});










Route::get('/contact_us', 'HomeController@contact_us');

Route::get('/terms_condition', 'HomeController@terms_condition');

Route::get('/privacy', 'HomeController@privacy');
Route::get('/about', 'HomeController@about');
Route::get('/Refer', 'HomeController@refer');



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

  Route::get('admin/recom_property', 'PropertyController@recom_property');
  Route::get('admin/new_property', 'PropertyController@new_property');
  Route::resource('admin/envelope', 'EnvelopeController');
  Route::resource('admin/slideshows', 'SlideshowsController');
  Route::resource('admin/setting', 'SettingController');
  Route::resource('admin/bts', 'BtsController');

});

Route::group(['middleware' => 'web'], function () {

Route::get('/', 'HomeController@index');
Route::get('/asset-{id}', 'ProductController@show');

});


Route::group(['middleware' => 'auth'], function () {
  Route::get('/my_wishlist', 'WishlistController@my_wishlist');

  Route::post('my_wishlist_del', 'WishlistController@my_wishlist_del');
  Route::resource('comment', 'CommentController');
  });
