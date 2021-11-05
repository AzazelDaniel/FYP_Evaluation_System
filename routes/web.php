<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::group(['prefix' => 'student','as' => 'student.','namespace' => 'Auth'], function () {
Route::get('/student-registration', 'StudentRegister@register')->name('register');
Route::post('/student-registration', 'StudentRegister@store')->name('store');
});
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin','as' => 'admin.','namespace' => 'Admin','middleware' => ['auth', 'admin']], function () {
    Route::get('/register-student', 'HomeController@index')->name('home');
	Route::resource('/lecturers', UserController::class);
	Route::resource('/students', StudentController::class);
	Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
	Route::put('/profile', 'ProfileController@update')->name('profile.update');
	Route::put('/profile/password', 'ProfileController@password')->name('profile.password');
	Route::get('/changeStatus', 'StudentController@changeStatus')->name('changeStatus');
	
});
Route::group(['prefix' => 'lecturer','as' => 'lecturer.','namespace' => 'Lecturer','middleware' => ['auth']], function () {
	Route::get('/supervisor', 'SupervisorController@index')->name('supervisor.index');
	Route::get('/supervisor/{student}/edit', 'SupervisorController@edit')->name('supervisor.evaluate');
	Route::put('/supervisor/{student}', 'SupervisorController@update')->name('supervisor.submit');

	Route::get('/examiner1', 'Examiner1Controller@index')->name('examiner1.index');
	Route::get('/examiner1/{student}/edit', 'Examiner1Controller@edit')->name('examiner1.evaluate');
	Route::put('/examiner1/{student}', 'Examiner1Controller@update')->name('examiner1.submit');

	Route::get('/examiner2', 'Examiner2Controller@index')->name('examiner2.index');
	Route::get('/examiner2/{student}/edit', 'Examiner2Controller@edit')->name('examiner2.evaluate');
	Route::put('/examiner2/{student}', 'Examiner2Controller@update')->name('examiner2.submit');

	Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
	Route::put('/profile', 'ProfileController@update')->name('profile.update');
	Route::put('/profile/password', 'ProfileController@password')->name('profile.password');
	
});

