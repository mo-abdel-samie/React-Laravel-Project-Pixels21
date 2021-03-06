<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ContentController;

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
        Route::get('/home', [ContentController::class, 'getHomeContent']);
        Route::get('/about', [ContentController::class,'getAboutContent']);
        Route::get('/courses', [ContentController::class,'getCoursesContent']);
        Route::get('/blogs', [ContentController::class,'getBlogsContent']);
        Route::get('/projects', [ContentController::class,'getProjectsContent']);
        Route::get('/events', [ContentController::class,'getEventsContent']);
    });

    Route::group(['prefix'=>'blogs'], function () {
        Route::get('/all', [ContentController::class,'getAllBlogs']);
        Route::get('/get-blog-byId', [ContentController::class,'getSingleBlog']);
    });

    Route::group(['prefix'=>'courses'], function () {
        Route::get('/all', [ContentController::class,'getAllCourses']);
        Route::get('/get-course-byId', [ContentController::class,'getSingleCourse']);
    });

    Route::group(['prefix'=>'projects'], function () {
        Route::get('/all', [ContentController::class,'getAllProjects']);
        Route::get('/get-project-byId', [ContentController::class,'getSingleProject']);
    });
});
