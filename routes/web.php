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
//Route::get('/verify/{$verificationString}', 'SponsorController@verify')->name('verify');
Route::get('/verify', 'SponsorController@verify')->name('verify');


Route::get('/account/{id}', 'UserController@index')->name('user.edit');
Route::put('/account', 'UserController@update')->name('user.update');

Route::get('/project', 'ProjectController@index')->name('userProjects.all');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/project', 'ProjectController@store')->name('project.store');
Route::get('/project/{project}', 'ProjectController@show')->name('userProjects.show');
Route::get('/project/{project}/edit', 'ProjectController@edit')->name('userProjects.edit');
Route::put('/project/{project}', 'ProjectController@update')->name('userProjects.update');
Route::get('/projects/{user}', 'ProjectController@filterBy')->name('userProjects.view');




Auth::routes(['verify' => true]);

Route::get('/adminarea', 'AdminController@index')->name('admin.home');
Route::get('/admin/edit', 'AdminController@edit')->name('admin.edit');
Route::get('/admin/allusers', 'AdminController@showUsers')->name('admin.showallusers');
Route::get('/admin/allusers/{user}', 'AdminController@filterByUser')->name('admin.showuser');
Route::get('/admin/{user}/projects', 'AdminController@filterByUserProjects')->name('admin.showuserprojects');
Route::get('/admin/allprojects', 'AdminController@showProjects')->name('admin.showallprojects');
Route::get('/admin/projects/{project}', 'AdminController@filterByProject')->name('admin.showproject');
Route::get('/admin/updatestatus/{project}/{status}', 'AdminController@updateStatus')->name('admin.updatestatus');



Route::get('/clientarea', 'HomeController@index')->name('clientarea');
