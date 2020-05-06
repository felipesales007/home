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

Route::get ('/', function () { return redirect('home'); });

Route::get ('home',          ['as' => 'home.page',     'uses' => 'Page\HomeController@show']);
Route::get ('contato',       ['as' => 'contact.page',  'uses' => 'Page\ContactController@show']);
Route::post('contato/email', ['as' => 'contact.email', 'uses' => 'Page\ContactController@email']);
