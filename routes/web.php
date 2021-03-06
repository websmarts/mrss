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

//  Route::get('phpinfo', function() {
//    echo phpinfo();
//    exit;
//  });

// Route::get('/', function () {
//     return redirect('home');
// });

Route::get('/', 'HomeController@index');

Route::get('home', 'PagesController@index')->name('home');
Route::get('storage', 'PagesController@index')->name('storage');
Route::get('removal', 'PagesController@index')->name('removal');
Route::get('modules', 'PagesController@index')->name('modules');
Route::get('contact', 'PagesController@index')->name('contact');
Route::get('faqs', 'PagesController@index')->name('faqs');
Route::get('privacy', 'PagesController@index')->name('privacy');
Route::get('terms', 'PagesController@index')->name('terms');

Route::get('message_us', 'PagesController@index')->name('message_us');
Route::get('access_your_storage', 'PagesController@index')->name('access_your_storage');
Route::get('book_storage_return', 'PagesController@index')->name('book_storage_return');
Route::get('thankyou', 'PagesController@index')->name('thankyou');

Route::get('cart', 'CartController@index')->name('cart');

Auth::routes();
// Add GET route for logout option
Route::get('logout', 'Auth\LoginController@logmeout');

Route::middleware(['auth:web'])->name('admin')->prefix('admin')->group(function () {
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

    Route::get('password', 'AdminPasswordController@index')->name('.password');
    Route::post('password', 'AdminPasswordController@update');
});
