<?php

// use App\User;
// Route::get('test', function(){
//     $collection = collect([1,2,3,4,5,6,7,8,9,0]);
//     $items = $collection->forPage($_GET[], 1); //Filter the page var
//     dd($items);
// });
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
// Basic Navigation Routes
Route::get('/', 'NavigationController@index')->name('/');
Route::get('/about', 'NavigationController@about')->name('about');
Route::get('/contact', 'NavigationController@contact')->name('contact');
Route::get('/blog', 'NavigationController@blog')->name('blog'); //wordpress will be used here
Route::get('/clientarea', 'NavigationController@clientarea')->name('clientarea');

// Auth Routes
Auth::routes(['verify' => true]);
Route::get('/registerphase', 'UserController@continuereg')->name('reg.phase2');
Route::post('/registerphase', 'UserController@continueregSave')->name('save.regphase');
Route::get('/register/{state}/lgas', 'UserController@getLgaByState');

// User Account Route
Route::get('/account/{userid?}', 'UserController@show')->name('user.show');
Route::put('/account', 'UserController@update')->name('user.update');
Route::get('/account/{userid}/edit', 'UserController@edit')->name('user.edit');

//Guarantor Route
Route::resource('/guarantor', 'GuarantorController');
Route::resource('/duration', 'DurationController');
Route::resource('/repaymentplans', 'RepaymentPlanController');

// Work on this tomorrow
Route::resource('/organization', 'DurationController');

// Projects
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/projects', 'ProjectController@store')->name('project.store');
Route::get('/projects/{projectSlug}', 'ProjectController@show')->name('project.show')->middleware('checkprojectstatus');
Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('project.edit');
Route::put('/projects/{project}', 'ProjectController@update')->name('project.update');
Route::get('/userprojects', 'ProjectController@filterByUser')->name('user.projects.show');
Route::delete('/projects/{project}/delete', 'ProjectController@delete')->name('project.delete');
Route::get('/projects/{project}/restore', 'ProjectController@restoreProject')->name('project.restore');
Route::get('/projects/{project}/hit', 'ProjectController@increaseProjectHit');
Route::delete('/projects/{project}/destroy', 'ProjectController@destroy')->name('project.destroy');
Route::get('/projectshistory', 'ProjectController@ProjectsHistory')->name('projects.history'); // work on the ui of this route

//Sponsorship routes
Route::post('/projects/{project}/sponsor', 'SponsorController@sponsorProject')->name('sponsor.project');
Route::get('/sponsorreturns/{project}/{amount}', 'SponsorController@sponsorReturns'); //AJAX Route
Route::get('/userprojects/sponsored', 'SponsorController@sponsoredProjects')->name('sponsored.project');

//Email Route
Route::post('/email', 'EmailSubscriptionController@subscribe')->name('email.subscribe');

// Admin Route
Route::get('/adminarea', 'AdminController@index')->name('admin.home');
Route::get('/users', 'AdminController@showUsers')->name('admin.show.users');
Route::get('/users/{user}', 'AdminController@filterByUser')->name('admin.showuser');
Route::get('/users/{user}/projects', 'AdminController@filterByUserProjects')->name('admin.show.userprojects');
Route::get('/admin/projects', 'AdminController@showProjects')->name('admin.showallprojects');
Route::get('/admin/projects/{project}', 'AdminController@filterByProject')->name('admin.showproject');
Route::get('/admin/projects/{project}/subscriptions', 'SponsorController@filterByProjectSubscribers')->name('admin.show.subscribers')->middleware('admin');
Route::get('/admin/subscriptions', 'AdminController@subscriptions')->name('admin.projects.sponsored');





//Ajax Routes
Route::get('/admin/updatestatus/{project}/{status}', 'AdminController@updateStatus')->name('admin.updatestatus');
Route::get('/subscriptionstatus/{subscription}/{status}', 'SponsorController@subscriptionStatus');



// unknown
// Route::get('/verify', 'SponsorController@verify')->name('verify');
