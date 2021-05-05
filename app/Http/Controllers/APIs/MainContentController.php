<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\admin\Content;
use Illuminate\Http\Request;

class MainContentController extends Controller
{
    use GeneralTrait;

    // CMS
    public function getHomeContent() {
        $sections = Content::all();
        return $sections;
    }
    public function getAboutContent() {
        $sections = Content::all();

    }
    public function getCoursesContent() {

    }
    public function getProjectsContent() {

    }
    public function getBlogsContent() {

    }
    public function getEventsContent() {

    }

    // Blogs
    public function getAllBlogs() {

    }
    // Single Blog
    public function getSingleBlog($id) {

    }

    // Courses
    public function getAllCourses() {

    }
    // Single Course
    public function getSingleCourse($id) {

    }

    // Projects
    public function getAllProjects() {

    }
    // Single Project
    public function getSingleProject($id) {

    }
}
