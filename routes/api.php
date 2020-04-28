<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('WebserviceLacalization')->group(function () {
    Route::post('signup', 'WebService\signup@signup');
    Route::post('signin', 'WebService\signin@signin');
    Route::post('requestCode', 'WebService\requestCode@requestCode');
    Route::post('confirmCode', 'WebService\confirmCode@confirmCode');
    Route::get('get_ads', 'WebService\AdController@getAds');
    Route::get('get_categories', 'WebService\CategoryController@getCategories');
    Route::get('get_setting', 'WebService\SettingController@getSetting');
    Route::get('get_places', 'WebService\PlaceController@getPlaces');
    Route::get('get_all_places', 'WebService\PlaceController@getAllPlaces');
    Route::get('place_detail', 'WebService\PlaceController@placeDetail');
    Route::get('place_offers', 'WebService\PlaceController@placeOffers');
    Route::get('all_offers', 'WebService\OfferController@index');
    Route::post('store_requesy', 'WebService\StoreRequestController@store');
    Route::get('view_package', 'WebService\PackageController@index');

});

Route::middleware(['auth:api', 'WebserviceLacalization'])->group(function () {
    Route::post('getProfile', 'WebService\getProfile@getProfile');
    Route::post('updateProfile', 'WebService\updateProfile@updateProfile');
    Route::post('changePassword', 'WebService\changePassword@changePassword');
    Route::post('getCities', 'WebService\getCities@getCities');
    Route::post('getCategories', 'WebService\getCategories@getCategories');
    Route::post('add_package', 'WebService\PackageController@store');
    Route::post('add_offer', 'WebService\OfferController@store');
    Route::post('deleteElmenet', 'WebService\deleteElmenet@deleteElmenet');
    Route::post('getMessages', 'WebService\getMessages@getMessages');
    Route::post('sendMessage', 'WebService\getMessages@sendMessage');
    Route::post('editPackage', 'WebService\PackageController@editPackage');
    Route::post('editPlace', 'WebService\PlaceController@editPlace');
    Route::post('addRate', 'WebService\addRate@addRate');

});
