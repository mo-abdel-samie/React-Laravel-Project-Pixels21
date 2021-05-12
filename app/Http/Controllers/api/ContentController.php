<?php

namespace App\Http\Controllers\api;

use App\Http\Traits\GeneralTrait;
use App\Models\admin\Blog;
use App\Models\admin\Content;
use App\Models\admin\Course;
use App\Models\admin\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    use GeneralTrait;


    // CMS
    public $data =[];
    public function getSections($keys) {
        $sections = Content::all();
        foreach ($sections as $section) {
            if(in_array($section->section_name, $keys)) {
                $this->data[$section->section_name] = json_decode($section->section_content);
            }
        }
    }

    public function getHomeContent() {
        $this->getSections(['home_header', 'home_slogan', 'home_about', 'home_statistics', 'home_supervisor']);
        return $this->data;
    }
    public function getAboutContent() {
        $this->getSections(['about_header', 'about_slogan', 'about_FAQ']);
        return $this->data;
    }
    public function getCoursesContent() {
        $this->getSections(['courses_page', 'course_item']);
        return $this->data;
    }
    public function getProjectsContent() {
        $this->getSections(['projects_header']);
        return $this->data;
    }
    public function getBlogsContent() {
        $this->getSections(['home_header', 'home_slogan']);
        return $this->data;
    }
    public function getEventsContent() {
        $this->getSections(['events_header']);
        return $this->data;
    }


    // Blogs
    public function getAllBlogs() {
        $blogs = Blog::all();
        return $blogs;
    }
    /// Single Blog
    public function getSingleBlog(Request $request) {
        $blog = Blog::find($request->id);
        return $blog;
    }

    // Courses
    public function getAllCourses() {
        $courses = Course::all();
        return $courses;
    }
    /// Single Course
    public function getSingleCourse(Request $request) {
        $course = Course::find($request->id);
        return $course;
    }

    // Projects
    public function getAllProjects() {
        $projects = Project::all();
        return $projects;
    }
    /// Single Project
    public function getSingleProject(Request $request) {
        $project = Project::find($request->id);
        $project->projectPage;
        return $project;
    }
}
