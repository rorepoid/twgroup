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

Route::get('/', 'PublicationController@index');
Route::resource('/publications', 'PublicationController')->only([
    'index', 'show'
]);

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::post('/publications/comments/{publication}', 'CommentController@store')->name('comments.store');
    Route::resource('/publications', 'PublicationController')->except([
        'index', 'show'
    ]);
});
