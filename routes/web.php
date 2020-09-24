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

//home
Route::get('/home', 'HomeController@index')->name('home');

//todo
Route::get('/todos', 'TodosController@index');

Route::get('/todos/{todo_list_id}', 'TodosController@add');
Route::post('/todos/{todo_list_id}', 'TodosController@create');

Route::get('/todos/edit/{todos}', 'TodosController@edit');
Route::post('/todos/edit/{todos}', 'TodosController@update');

//todo_finish
Route::get('/todos_finsh', 'TodosController@check_finish');

//notes
Route::get('/notes', 'NotesController@notes');

Route::get('/notes/add', 'NotesController@add_notes');
Route::post('/notes/add', 'NotesController@create_notes');

Route::get('/notes/{notes}', 'NotesController@detail_notes');
Route::post('/notes/{notes}', 'NotesController@update_notes');

//todo list
Route::get('/list/create', 'TodosController@add_list');
Route::post('/list/create', 'TodosController@create_list');

Route::get('/list/delete/{list}', "TodosController@delete_list");

//calender
Route::get('/calendar', 'CalenderController@index');

Route::get('/calendar/add', 'CalenderController@add_cal_event')->name('calendar_add');
Route::post('/calendar/add', 'CalenderController@create_cal_event');

//localization
Route::get('/lang/{lang}', 'LocaleController@index');

//page not found
Route::get('/page_not_found', 'HomeController@page_not_found');

//account
Route::get('/account', 'AccountController@index');