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

// funziona anche se dà errore
Auth::routes();

// Route::middleware('auth')->get('/admin/home', 'Admin\HomeController@index')->name('admin.home');

// Route::middleware('auth')->get('/admin/post', 'Admin\PostController@index')->name('admin.post.index');
// è una ripetizione dover scrivere tutte le volte admin.
// laravel ci mette a disposizione uno strumento per raggruppare una serie di rotte con informazioni in comune
// vale pure per tutte le rotte con lo stesso middleware e per i prefissi

/* Route::middleware per tutte le rotte
    -> prefisso per tutti gli url
    -> namespace per le rotte
    ->prefisso nomi delle rotte
    l'ordine non ha importanza, basta che group sia ultimo. Si può però annidare il raggruppamento
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {

        Route::get('/home', 'HomeController@index')->name('home');

        // tutte le rotte della crud controller avranno i prefissi detti precedentemente
        Route::resource('posts', 'PostController');
    });
