<?php

Route::group(['namespace' => 'Module\Acl\Http\Controllers'], function () {
    Route::group(['prefix' => 'system/users'], function () {
        Route::get('create', [
            'as' => 'users.create',
            'uses' => 'UserController@getCreate'
        ]);
    });

    Route::group(['prefix' => 'system/roles'], function () {
        Route::get('', [
            'as' => 'roles.list',
            'uses' => 'RoleController@getList'
        ]);

        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'RoleController@getCreate'
        ]);
    });
});