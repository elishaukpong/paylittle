<?php

// use App\Models\Project;
Route::get('test', function(){
    // $project = Project::whereUserId(Auth::id())->has('photo')->with('photo')->first();
    // return dd(file_exists($previousImage = public_path() . $project->photo->projectavatar));
    return Auth::user()->projects()->paginate(9);
});
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

Route::get('/account/{user}', 'UserController@show')->name('user.show');
Route::get('/account/{user}/edit', 'UserController@edit')->name('user.edit');
Route::put('/account/{user}', 'UserController@update')->name('user.update');

//Guarantor Route
Route::resource('/guarantor', 'GuarantorController');

// Projects
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/projects', 'ProjectController@store')->name('project.store');
Route::get('/projects/{project}/show', 'ProjectController@show')->name('project.show')->middleware('checkprojectstatus');
Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('project.edit');
Route::put('/projects/{project}', 'ProjectController@update')->name('project.update');
Route::get('/userprojects', 'ProjectController@filterByUser')->name('user.projects.show');

// not touched yet

Route::delete('/project/{project}/delete', 'ProjectController@delete')->name('userProjects.delete');
Route::delete('/project/{project}/destroy', 'ProjectController@destroy')->name('project.destroy');
Route::get('/thrashedprojects', 'ProjectController@trashedProjects')->name('projects.trashed');
Route::get('/projects/{project}/restore', 'ProjectController@restoreProject')->name('project.restore');

Route::get('/projects/{project}/hit', 'ProjectController@increaseProjectHit');
Route::get('/projectshistory', 'ProjectController@ProjectsHistory')->name('projects.history');



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
Route::get('/admin/users/{user}', 'AdminController@filterByUser')->name('admin.showuser');
Route::get('/admin/{user}/projects', 'AdminController@filterByUserProjects')->name('admin.showuserprojects');
Route::get('/admin/projects', 'AdminController@showProjects')->name('admin.showallprojects');
Route::get('/admin/projects/{project}', 'AdminController@filterByProject')->name('admin.showproject');
Route::get('/admin/subscriptions', 'AdminController@subscriptions')->name('admin.projectsubscriptions');




//Ajax Routes
Route::get('/admin/updatestatus/{project}/{status}', 'AdminController@updateStatus')->name('admin.updatestatus');
Route::get('/sponsorreturns/{project}/{amount}', 'SponsorController@sponsorReturns');
Route::get('/subscriptionstatus/{subscription}/{status}', 'SponsorController@subscriptionStatus');



// unknown
// Route::get('/verify', 'SponsorController@verify')->name('verify');
