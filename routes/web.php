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

Auth::routes();
Route::get('/', 'TransactionsController@index')->name('home')->middleware('auth');
Route::get('single', 'TransactionsController@single')->name('single')->middleware('auth');
Route::get('approve/{id}', 'TransactionsController@approve')->name('approve')->middleware('auth');
Route::get('action_required/{id}', 'TransactionsController@actionRequired')->name('action_required')->middleware('auth');