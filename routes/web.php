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
    return view('home');
});

Route::get('modules', function () {
    return view("pages.modules");
});

Route::get('faqs', function () {
    return view("pages.faqs");
});
Route::get('contact', function () {
    return view("pages.contact");
});

Route::get('privacy', function () {
    return view("pages.privacy");
});
Route::get('terms', function () {
    return view("pages.terms");
});

Route::get('booking', function () {
    return view("booking");
});
