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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/todos', 'TodosController@index');

Route::get('/todos/{todo_list_id}', 'TodosController@add');
Route::post('/todos/{todo_list_id}', 'TodosController@create');

Route::get('/todos/edit/{todos}', 'TodosController@edit');
Route::post('/todos/edit/{todos}', 'TodosController@update');

Route::get('/notes', 'TodosController@notes');

Route::get('/notes/add', 'TodosController@add_notes');
Route::post('/notes/add', 'TodosController@create_notes');

Route::get('/notes/{notes}', 'TodosController@detail_notes');
Route::post('/notes/{notes}', 'TodosController@update_notes');

Route::get('/todos_finsh', 'TodosController@check_finish');

Route::get('/list/create', 'TodosController@add_list');
Route::post('/list/create', 'TodosController@create_list');
