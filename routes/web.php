<?php
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/contact', 'PagesController@contact');
Route::get('/pagelist', 'PagesController@pagelist');

Route::resource('posts', 'PostsController');

Route::get('/profile', 'UsersController@profile');

Route::get('/settings', 'DashboardController@settings');

Route::resource('pages', 'PagesController');

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');

Route::resource('core/services', 'ServicesController');
Route::resource('messages', 'MessagesController');

Route::put('/users/{user}/resetpass','UsersController@resetpass');
Route::put('/users/{user}/enable','UsersController@enable');
Route::put('/users/{user}/disable','UsersController@disable');
Route::get('/changepassword', 'UsersController@changepassword');
Route::put('/users/{user}/changepwd','UsersController@savechangepwd');

Route::get('/admin', function (){
    return redirect('/login');
});

Route::get('/home', function (){
    return redirect('/');
});

Route::get('/pages', function (){
    return redirect('/pagelist');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/register', function (){
    return redirect('/login')->with('error', 'Unauthorized Page!');
});