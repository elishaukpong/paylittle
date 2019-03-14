<?php
use App\Models\States;

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
Route::get('/about', 'NavigationController@about')->name('about');
Route::get('/contact', 'NavigationController@contact')->name('contact');
Route::get('/blog', 'NavigationController@blog')->name('blog');

Route::get('/verify', 'SponsorController@verify')->name('verify');

Route::get('/account/{user}', 'UserController@show')->name('user.show');
Route::get('/account/{user}/edit', 'UserController@edit')->name('user.edit');
Route::put('/account/{user}', 'UserController@update')->name('user.update');

//Guarantor Route
Route::resource('/guarantor', 'GuarantorController');


Route::get('/project', 'ProjectController@index')->name('userProjects.all');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/project', 'ProjectController@store')->name('project.store');
Route::get('/project/{project}/show', 'ProjectController@show')->name('userProjects.show')->middleware('checkprojectstatus');
Route::get('/project/{project}/edit', 'ProjectController@edit')->name('userProjects.edit');
Route::get('/project/{project}/delete', 'ProjectController@destroy')->name('userProjects.delete');
Route::put('/project/{project}', 'ProjectController@update')->name('userProjects.update');
Route::get('/projects/{user}', 'ProjectController@filterBy')->name('userProjects.view');
Route::get('/projects/{project}/hit', 'ProjectController@increaseProjectHit');

Route::get('test', function(){
    $states = States::all()->random();
    return  $states->lga()->get()->random();
});

//Sponsorship routes
Route::post('/projects/{project}/sponsor', 'SponsorController@sponsorProject')->name('sponsor.project');
Route::get('/projects/{user}/sponsored', 'SponsorController@sponsoredProjects')->name('view.sponsor');
Route::get('/sponsor/payment', 'SponsorController@payment')->name('payment');


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
