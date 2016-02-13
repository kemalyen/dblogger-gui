<?php

Route::group(
    [
        'prefix' => Config::get("dblogger-gui.route-prefix"),

    ],
    function () {
        Route::get('/', ['uses' => 'DbLoggerController@index']);
    }

);