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

Route::namespace('Products')->group(function(){
    Route::get('/', 'ProductIndexController')->name('productIndex');
    Route::get('list', 'ProductIndexController@list')->name('productList');
    Route::get('add', 'ProductAddController')->name('productAdd');
    Route::post('save', 'ProductAddController@save')->name('productSave');
    Route::get('change/{id?}', 'ProductChangeController')->name('productChange');
    Route::post('update/{id?}', 'ProductChangeController@update')->name('productUpdate');
    Route::get('delete/{id?}', 'ProductChangeController@delete')->name('productDelete');
});
