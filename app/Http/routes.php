<?php

Route::controller('auth/password', 'Auth\PasswordController', [
	'getEmail' => 'auth.password.email',
	'getReset' => 'auth.password.reset'
]);

Route::controller('auth', 'Auth\AuthController', [
	'getLogin' => 'auth.login',
	'getLogout' => 'auth.logout'
]);

Route::get('backend/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);
Route::resource('backend/users', 'Backend\UsersController', ['except' => ['show']]);

Route::get('backend/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'Backend\PagesController@confirm']);
Route::resource('backend/pages', 'Backend\PagesController', ['except' => ['show']]);

Route::get('backend/blog/{blog}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);
Route::resource('backend/blog', 'Backend\BlogController');

Route::get('backend/content_home/{pages}/confirm', ['as' => 'backend.content_home.confirm', 'uses' => 'Backend\ContentHomeController@confirm']);
Route::resource('backend/content_home', 'Backend\ContentHomeController');

Route::post('backend/content/upload', 'Backend\ContentController@upload');
Route::get('backend/content/{pages}/confirm', ['as' => 'backend.content.confirm', 'uses' => 'Backend\ContentController@confirm']);
Route::resource('backend/content', 'Backend\ContentController', ['except' => ['show']]);

Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);

Route::resource('backend/info', 'Backend\InfoController');

Route::group(['prefix' => 'contact'], function(){
	Route::get('', 'ContactController@index');
	Route::post('create', 'ContactController@create');
});

Route::get('contact', ['as' => 'contact.index', 'uses' => 'ContactController@index']);

Route::group(['prefix' => 'subscribe'], function(){
	Route::get('', 'SubscribeController@index');
	Route::post('create', 'SubscribeController@create');
});
Route::get('subscribe', ['as' => 'subscribe.index', 'uses' => 'SubscribeController@index']);

Route::group(['prefix'=>'gallery'], function(){
	Route::post('upload', 'Backend\ContentController@upload');
	Route::get('', 'Backend\ContentController@gallery');
});
