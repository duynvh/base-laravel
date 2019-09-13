<?php

Route::group(['namespace' => 'Module\Blog\Http\Controllers'], function () {
    Route::group(['prefix' => 'system/categories'], function () {
        Route::get('create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@getCreate'
        ]);
    });
});