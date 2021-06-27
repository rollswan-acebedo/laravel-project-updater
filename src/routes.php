<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/updater', 'namespace' => 'Rollswan\LaravelProjectUpdater\Controllers'], function () {
    Route::post('/', 'UpdaterController@updateProject')->middleware('lpu');
});
