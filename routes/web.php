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

Route::get('/', function () {
    return redirect('home');
});

Route::get('modules', function () {
    return view("pages.modules");
});

Route::get('home', 'PagesController@index');
Route::get('storage', 'PagesController@index')->name('storage');
Route::get('removal', 'PagesController@index')->name('removal');
Route::get('modules', 'PagesController@index')->name('modules');
Route::get('contact', 'PagesController@index')->name('contact');
Route::get('faqs', 'PagesController@index')->name('faqs');
Route::get('privacy', 'PagesController@index')->name('privacy');
Route::get('terms', 'PagesController@index')->name('terms');

Route::get('cart', 'CartController@index')->name('cart');

Auth::routes();
// Add GET route for logout option
Route::get('logout', function () {
    auth()->logout();
    return redirect('/');
});

Route::name('admin')->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');

    Route::get('products', 'AdminProductsController@index')->name('.products');
    Route::get('products/{product}', 'AdminProductsController@edit')->name('.product.edit');
    Route::post('products/{product}', 'AdminProductsController@update')->name('.product.update');

    Route::get('locations', 'AdminLocationsController@index')->name('.locations');
    Route::post('locations', 'AdminLocationsController@update')->name('.locations.update');

    Route::get('cartage/removal', 'AdminCartageController@removal_index')->name('.cartage.removal');
    Route::post('cartage/removal', 'AdminCartageController@removal_update')->name('.cartage.removal.update');

    Route::get('cartage/return', 'AdminCartageController@return_index')->name('.cartage.return');
    Route::post('cartage/return', 'AdminCartageController@return_update')->name('.cartage.return.update');

    Route::get('pages/{page}', 'AdminPagesController@index')->name('.pages');
    Route::post('pages/{page}', 'AdminPagesController@update')->name('.page.update');

    Route::get('chunks', 'AdminChunksController@index')->name('.chunks');
    Route::post('chunks', 'AdminChunksController@update')->name('.update.chunks');

    Route::get('filemanager','AdminFileManagerController@index')->name('.filemanager');
});

Route::get('standalone', function () {
    return view('admin.standalone');
});

Route::post('output', function () {
    $content = request('content');
    return view('admin.output', ['content' => $content]);
})->name('submit');
