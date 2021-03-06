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

Route::get('/', 'BooksController@index');

Route::post('/books', 'BooksController@store');

Route::post('/book/edit/{id}', 'BooksController@edit');

Route::put('/book/update', 'BooksController@update');

Route::delete('/book/{book}', 'BooksController@destroy');

Auth::routes();

Route::get('/home', 'BooksController@index')->name('home');
