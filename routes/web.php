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
Route::get('/', 'NavigationController@index')->name('/');

Route::get('/about', 'NavigationController@about');
Route::get('/contact', 'NavigationController@contact');
Route::get('/sponsor', 'NavigationController@sponsor')->name('sponsor');
Route::post('/sponsor', 'SponsorController@createSponsor');
Route::get('/client', 'NavigationController@paylittler');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
