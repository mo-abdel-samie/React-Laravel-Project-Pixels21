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


Route::group( ['prefix' => 'admin','namespace' => 'admin'] , function () {
    Route::get('/dashboard','CMSController@index')->name('admin.dashboard');
    Route::get('/sections','CMSController@showSections')->name('admin.sections');
    Route::get('/sections/section/{id}','CMSController@showSectionForm')->name('admin.sections.sectionForm');
    Route::post('/sections/section/update/{id}','CMSController@updateSection')->name('admin.slogan.update');
});





Route::get('/{mainPath?}', function () {
    return view('app');
});


Route::get('project/{projectId?}', function () {
    return view('app');
});

Route::get('courses/{category}', function () {
    return view('app');
});

Route::get('course/{courseId?}', function () {
    return view('app');
});

Route::get('blog/{blogId?}', function () {
    return view('app');
});
