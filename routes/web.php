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

use App\Models\States;

Route::get('/', 'NavigationController@index')->name('/');
Route::get('/about', 'NavigationController@about')->name('about');
Route::get('/contact', 'NavigationController@contact')->name('contact');
Route::get('/blog', 'NavigationController@blog')->name('blog');

Route::get('/verify', 'SponsorController@verify')->name('verify');


Route::get('/account/{user}', 'UserController@show')->name('user.show');
Route::get('/account/{user}/edit', 'UserController@edit')->name('user.edit');
Route::put('/account/{user}', 'UserController@update')->name('user.update');


Route::get('/project', 'ProjectController@index')->name('userProjects.all');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/project', 'ProjectController@store')->name('project.store');
Route::get('/project/{project}/show', 'ProjectController@show')->name('userProjects.show');
Route::get('/project/{project}/edit', 'ProjectController@edit')->name('userProjects.edit');
Route::get('/project/{project}/delete', 'ProjectController@destroy')->name('userProjects.delete');
Route::put('/project/{project}', 'ProjectController@update')->name('userProjects.update');
Route::get('/projects/{user}', 'ProjectController@filterBy')->name('userProjects.view');

Route::get('test/{project}', 'ProjectController@checkSponsorshipAmountRemaining');
Route::get('test', function(){
    return States::find(5)->lga;
}
);

//Sponsorship routes
Route::post('/projects/{project}/sponsor', 'SponsorController@sponsorProject')->name('sponsor.project');
Route::get('/projects/{user}/sponsored', 'SponsorController@sponsoredProjects')->name('view.sponsor');
Route::get('/projects/{project}/hit', 'ProjectController@increaseProjectHit');

//Email Route
Route::post('/email', 'EmailSubscriptionController@subscribe')->name('email.subscribe');

Auth::routes([ 'verify' => true]);
Route::get('/registerphase', 'UserController@continuereg')->name('reg.phase2');
Route::post('/registerphase', 'UserController@continueregSave')->name('save.regphase');
Route::get('/register/{state}/lgas', 'UserController@getLgaByState');

Route::get('/adminarea', 'AdminController@index')->name('admin.home');
Route::get('/admin/edit', 'AdminController@edit')->name('admin.edit');
Route::get('/admin/allusers', 'AdminController@showUsers')->name('admin.showallusers');
Route::get('/admin/allusers/{user}', 'AdminController@filterByUser')->name('admin.showuser');
Route::get('/admin/{user}/projects', 'AdminController@filterByUserProjects')->name('admin.showuserprojects');
Route::get('/admin/allprojects', 'AdminController@showProjects')->name('admin.showallprojects');
Route::get('/admin/projects/{project}', 'AdminController@filterByProject')->name('admin.showproject');
Route::get('/admin/subscriptions', 'AdminController@subscriptions')->name('admin.projectsubscriptions');



Route::get('/clientarea', 'HomeController@index')->name('clientarea');

//Ajax Routes
Route::get('/admin/updatestatus/{project}/{status}', 'AdminController@updateStatus')->name('admin.updatestatus');
Route::get('/sponsorreturns/{project}/{amount}', 'SponsorController@sponsorReturns');
Route::get('/subscriptionstatus/{subscription}/{status}', 'SponsorController@subscriptionStatus');
