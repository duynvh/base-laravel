<?php

Route::group(['namespace' => 'Module\Contact\Http\Controllers'], function () {
    Route::get('/demo', 'ContactController@index');
});