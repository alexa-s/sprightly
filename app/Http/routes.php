<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  // Home route...
  Route::get('/', ['as' => 'home', 'uses' => 'ProjectController@index']);



  // User Authentication routes...
  Route::get('/login', 'UserController@getLogin');
  Route::post('/login', 'UserController@postLogin');
  Route::get('/logout', 'UserController@getLogout');

  // User Registration routes...
  Route::get('/register', 'UserController@getRegister');
  Route::post('/register', 'UserController@postRegister');

  // Custom Routes
  Route::get('/projects/{id}/statistics', 'ProjectController@getStatistics');
  Route::post('/projects/{id}/sync', 'ProjectController@sync');
  Route::post('/tasks/{id}/archive', 'TasksController@archive');

  // Model Routes
  Route::resource('projects', 'ProjectController');
  Route::resource('tasks', 'TasksController');



});