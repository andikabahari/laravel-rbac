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

Auth::routes();

Route::get('/', 'WelcomeController')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-management', 'HomeController@index')->name('user-management');

Route::get('/items', 'ItemController@index')->name('items');
Route::get('/items/create', 'ItemController@create')->name('create-item');
Route::post('/items', 'ItemController@store')->name('store-item');
Route::get('/items/{id}', 'ItemController@show')->name('show-item');
Route::get('/items/{id}/edit', 'ItemController@edit')->name('edit-item');
Route::put('/items/{id}', 'ItemController@update')->name('update-item');
Route::delete('/items/{id}', 'ItemController@destroy')->name('destroy-item');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('create-user');
Route::post('/users', 'UserController@store')->name('store-user');
Route::get('/users/{id}', 'UserController@show')->name('show-user');
Route::get('/users/{id}/edit', 'UserController@edit')->name('edit-user');
Route::put('/users/{id}', 'UserController@update')->name('update-user');
Route::delete('/users/{id}', 'UserController@destroy')->name('destroy-user');

Route::get('/roles', 'RoleController@index')->name('roles');

Route::get('/permissions', 'PermissionController@index')->name('permissions');
