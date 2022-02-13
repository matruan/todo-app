<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\TasksController@index');

Route::get('/tasks', 'App\Http\Controllers\TasksController@index');

Route::get('/tasks/create', 'App\Http\Controllers\TasksController@create');

Route::post('/tasks', 'App\Http\Controllers\TasksController@store');

Route::patch('/tasks/{id}', 'App\Http\Controllers\TasksController@update');

Route::delete('/tasks/{id}', 'App\Http\Controllers\TasksController@delete');