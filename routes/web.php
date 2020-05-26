<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Classification;
use App\task;

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

//task
Route::get('/', 'WelcomeController@Welcome')->name("Welcome");
Route::get('list', 'TaskController@showListForm')->name("list")->middleware('auth');
Route::get('list_push', 'TaskController@showListpush')->name("list.push");
Route::get('list_ING', 'TaskController@showListING')->name("list.ING");
Route::get('list/search', 'TaskController@showSearchListForm')->name("list.search");
Route::get('list_id/{tasks_id}', 'TaskController@taskdetail')->name("task.detail");
Route::post('list/gettask', 'TaskController@gettask')->name("task.get");
Route::post('list/taskcomplete', 'TaskController@taskcomplete')->name("task.complete");
Route::post('list_id/{tasks_id}', 'TaskController@taskprogress')->name("taskprogress");


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('profile','ProfileController@showprofile')->name('profile');

Route::post('AddTasks', 'TaskController@Add')->name("task.add");

Auth::routes();
//// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
