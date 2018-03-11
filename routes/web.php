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


Route::get('/', 'PagesController@welcome');

Route::get('/how-it-works', 'PagesController@howitworks');

Route::get('/chat', 'PagesController@chat')->name('chat'); //testing 


Auth::routes();


//student side
Route::prefix('student')->group(function(){
	Route::get('/home', 'StudentController@welcome')->name('student.welcome');
	Route::get('/help', 'StudentController@student_help')->name('student.help');
	Route::get('/explore', 'StudentController@explore')->name('student.explore');
	Route::get('/leaderboard', 'StudentController@leaderboard')->name('student.leaderboard');

	Route::get('/jobs/{job}', 'StudentController@showjob')->name('student.showjob');

	//Notifications
	Route::post('notification/get', 'NotificationController@get')->name('notification.invite');
	Route::post('notification/accept-invite', 'NotificationController@accept')->name('notification.accept');
	Route::post('notification/reject-invite', 'NotificationController@reject')->name('notification.reject');
	
});

//requests
// Route::post('student/profile/{profile}/experience ', 'ExperiencesController@store')->name('experience.create');



//client side
Route::prefix('client')->group(function(){
	Route::get('/', 'ClientController@welcome')->name('client.welcome');
	Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
	Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
	Route::get('/register', 'Auth\ClientRegisterController@showRegisterForm')->name('client.register');
	Route::post('/register', 'Auth\ClientRegisterController@register')->name('client.register.submit');

	Route::get('/dashboard', 'ClientController@index')->name('client.dashboard');
	Route::get('/help', 'ClientController@client_help')->name('client.help');
	Route::get('/home', 'ClientController@home')->name('client.home');
	Route::get('/termsandconditions', 'ClientController@kazi_terms')->name('client.kazi-terms');

	//view applications
	Route::get('/applications', 'ApplicationsController@index')->name('client.viewapplications');

	//Notifications 
	Route::post('notification/get', 'NotificationController@clientget')->name('notification.application');

});

//jobs
Route::resource('client/jobs', 'JobsController');

//cluster applications
// Route::resource('student/jobs/applications', 'ApplicationsController');
Route::post('student/jobs/application/{job}', 'ApplicationsController@store')->name('applications.store');

//user profile
Route::resource('student/profile', 'StudentProfileController');

Route::resource('student/profile/{profile}/experience', 'ExperiencesController', ['parameters' => [
    'profile' => 'student_id'
]]);
Route::resource('student/profile/{profile}/programming-language', 'LanguagesController', ['parameters' => [
    'profile' => 'student_id'
]]);
Route::resource('student/profile/{profile}/interest', 'InterestsController', ['parameters' => [
    'profile' => 'student_id'
]]);

//cluster dashboard
Route::resource('student/cluster', 'ClustersController');
Route::get('student/cluster/{cluster}/add-member', 'ClustersController@viewsearch')->name('addmember');
Route::get('student/cluster/{cluster}/add-member/search', 'ClustersController@autocomplete')->name('autocomplete'); //autocomplete

//creating a new request and storing it
Route::post('student/cluster/{cluster}/add-member/create-request', 'RequestsController@store')->name('send.request');

Route::get('student/cluster/create/add-member', 'ClustersController@viewsearch')->name('addmember-create');
































