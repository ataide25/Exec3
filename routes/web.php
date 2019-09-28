<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    Route::group(['prefix' => 'instituicao', 'as' => 'instituicao.'], function (){
        Route::get('/form/{id?}', 'InstituicaoController@form')->name('form');
        Route::get('/', 'InstituicaoController@index')->name('index');
        Route::post('/', 'InstituicaoController@create')->name('create');
        Route::put('/{id}', 'InstituicaoController@update')->name('update');
        Route::delete('/destroy', 'InstituicaoController@destroy')->name('destroy');
        Route::delete('/{id}', 'InstituicaoController@delete')->name('delete');
    });

    Route::group(['prefix' => 'curso', 'as' => 'curso.'], function (){
        Route::get('/form/{id?}', 'CursoController@form')->name('form');
        Route::get('/', 'CursoController@index')->name('index');
        Route::post('/', 'CursoController@create')->name('create');
        Route::put('/{id}', 'CursoController@update')->name('update');
        Route::delete('/destroy', 'CursoController@destroy')->name('destroy');
        Route::delete('/{id}', 'CursoController@delete')->name('delete');
    });

    Route::group(['prefix' => 'aluno', 'as' => 'aluno.'], function (){
        Route::get('/form/{id?}', 'AlunoController@form')->name('form');
        Route::get('/', 'AlunoController@index')->name('index');
        Route::post('/', 'AlunoController@create')->name('create');
        Route::put('/{id}', 'AlunoController@update')->name('update');
        Route::delete('/destroy', 'AlunoController@destroy')->name('destroy');
        Route::delete('/{id}', 'AlunoController@delete')->name('delete');
    });

    
});
