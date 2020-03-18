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

Route::get(
    '/',
    'IndexController@index'
)->name('index');

Route::delete(
    '/delete/{id}',
    'IndexController@delete'
)->name('index.delete');

Route::get(
    '/todo/{id}',
    'IndexController@get'
)->name('index.get');

Route::post(
    '/todo/{id}',
    'IndexController@update'
)->name('index.update');

Route::put(
    '/todo',
    'IndexController@add'
)->name('index.add');

