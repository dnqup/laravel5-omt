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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/{id}', 'HomeController@show')->name('show');

Auth::routes();

// comment
Route::post('comments/store', 'Client\CommentControlller@store')->name('comment.store');
Route::delete('comments/destroy/{id}', 'Client\CommentControlller@destroy')->name('comment.destroy');

Route::group(['prefix' => 'admin','namespace'=>'Admin', 'middleware' => ['auth', 'checkUser']], function () {
    // page home
    Route::get('/', 'PageController@index')->name('admin.home');

    //post
    Route::get('posts', 'PostController@index')->name('post.list');
    Route::post('posts/store', 'PostController@store')->name('post.store');
    Route::get('posts/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('posts/update/{id}', 'PostController@update')->name('post.update');
    Route::delete('posts/destroy/{id}', 'PostController@destroy')->name('post.destroy');

    //user
    Route::get('users', 'UserController@index')->name('user.list');
    Route::post('users/store', 'UserController@store')->name('user.store');
    Route::get('users/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('users/update/{id}', 'UserController@update')->name('user.update');
    Route::delete('users/destroy/{id}', 'UserController@destroy')->name('user.destroy');

    //role
    Route::get('roles', 'RoleController@index')->name('role.list');
    Route::get('roles/create', 'RoleController@create')->name('role.create');
    Route::post('roles/store', 'RoleController@store')->name('role.store');
    Route::get('roles/edit/{id}', 'RoleController@edit')->name('role.edit');
    Route::post('roles/update/{id}', 'RoleController@update')->name('role.update');
    Route::get('roles/destroy/{id}', 'RoleController@destroy')->name('role.destroy');

    //Permission
    Route::get('permission', 'PermissionController@index')->name('permission.list');
    Route::get('permission/create', 'PermissionController@create')->name('permission.create');
    Route::post('permission/store', 'PermissionController@store')->name('permission.store');
    Route::get('permission/edit/{id}', 'PermissionController@edit')->name('permission.edit');
    Route::post('permission/update/{id}', 'PermissionController@update')->name('permission.update');
    Route::get('permission/destroy/{id}', 'PermissionController@destroy')->name('permission.destroy');
});

