<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
*/
// back-end user routes
Route::resource('backend','Admin\UserController');


Route::get('{any}', function () {
    return view('layouts.app');
})->where('any', '.*');