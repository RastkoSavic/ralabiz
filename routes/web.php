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

// Base Routes
Route::get('/', 'ListingsController@index');

// Authentication Routes
Auth::routes();

// Listings Routes
Route::resource('listings', 'ListingsController');

// Dashboard Route
Route::get('/dashboard', 'DashboardController@index');
