<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{mainPath?}', function () {
    return view('app');
});

/**
 * Why i don't use this method?
 * By this method i can't show 404 error page when secLevel is wrong.
 =============================={ Two Levels Route }==================================
 Route::get('/{mainPath?}/{secLevelPath?}', function () {
     return view('app');
 });
 ====================================================================================
 
 */

Route::get('project/{projectId?}', function () {
    return view('app');
});
