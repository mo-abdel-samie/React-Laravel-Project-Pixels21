<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\MainContentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware'=>['api', 'checkPassword']], function () {

    Route::group(['prefix'=>'cms'], function () {
        Route::get('/home', 'MainContentController@getHomeContent');
        Route::get('/about', 'MainContentController@getAboutContent');
        Route::get('/courses', 'MainContentController@getCoursesContent');
        Route::get('/blogs', 'MainContentController@getBlogsContent');
        Route::get('/projects', 'MainContentController@getProjectsContent');
        Route::get('/events', 'MainContentController@getEventsContent');
    });

    Route::group(['prefix'=>'blogs'], function () {
        Route::get('/all', 'MainContentController@getAllBlogs');
        Route::get('/get-blog-byId/{id}', 'MainContentController@getSingleBlog');
    });

    Route::group(['prefix'=>'courses'], function () {
        Route::get('/all', 'MainContentController@getAllCourses');
        Route::get('/get-course-byId/{id}', 'MainContentController@getSingleCourse');
    });

    Route::group(['prefix'=>'projects'], function () {
        Route::get('/all', 'MainContentController@getAllProjects');
        Route::get('/get-project-byId/{id}', 'MainContentController@getSingleProject');
    });
});
