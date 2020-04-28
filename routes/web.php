<?php
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', function () {
    return redirect()->route('login');
})->name('admin.home');

Route::get('/{lang}', 'HomeController@index')->middleware('locale')->name('home');
Route::prefix('{lang}')->middleware(['auth', 'locale'])->group(function () {
    Route::any('home', 'HomeController@index')->name('users.search');
    Route::any('users/search', 'Dashboard\UserController@search')->name('users.search');
    Route::any('admins/search', 'Dashboard\AdminController@search')->name('admins.search');
    Route::any('places/search', 'Dashboard\PlaceController@search')->name('places.search');
    Route::any('users/search', 'Dashboard\UserController@search')->name('users.search');
    Route::any('store_requests/search', 'Dashboard\StoreRequestController@search')->name('store_requests.search');
    Route::any('categories/search', 'Dashboard\CategoryController@search')->name('categories.search');
    Route::any('sliders/search', 'Dashboard\SliderController@search')->name('sliders.search');
    Route::any('ads/search', 'Dashboard\AdController@search')->name('ads.search');
    Route::resource('users', 'Dashboard\UserController');
    Route::resource('admins', 'Dashboard\AdminController');
    Route::resource('settings', 'Dashboard\SettingController');
    Route::resource('categories', 'Dashboard\CategoryController');
    Route::resource('places', 'Dashboard\PlaceController');
    Route::resource('store_requests', 'Dashboard\StoreRequestController');
    Route::resource('users', 'Dashboard\UserController');
    Route::resource('ads', 'Dashboard\AdController');
    Route::resource('messages', 'Dashboard\MessageController');
});
