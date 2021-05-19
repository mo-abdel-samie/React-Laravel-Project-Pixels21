<?php

namespace App\Http\Controllers\api;

use App\Http\Traits\GeneralTrait;
use App\Models\admin\Blog;
use App\Models\admin\Content;
use App\Models\admin\Category;
use App\Models\admin\Course;
use App\Models\admin\Project;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    use GeneralTrait;


    // CMS
    public $data =[];
    public function getSections($key, $keys, $message) {
        $sections = Content::all();
        foreach ($sections as $section) {
            if(in_array($section->section_name, $keys)) {
                $this->data[$section->section_name] = json_decode($section->section_content);
            }
        }
        return $this->returnData($key, $this->data, $message);
    }

    public function getHomeContent() {
        return $this->getSections('home_content', ['home_header', 'home_slogan', 'home_about', 'home_statistics', 'home_supervisor'], 'data returned');

    }
    public function getAboutContent() {
        return $this->getSections('about_content', ['about_header', 'about_slogan', 'about_FAQ'], 'data returned');

    }
    public function getCoursesContent() {
        return $this->getSections('courses_content', ['courses_page', 'course_item'], 'data returned');
    }
    public function getProjectsContent() {
        return $this->getSections('projects_content', ['projects_header'], 'data returned');
    }
    public function getBlogsContent() {
        return $this->getSections('blogs_content', ['home_header', 'home_slogan'], 'data returned');
    }
    public function getEventsContent() {
        return $this->getSections('blogs_content', ['events_header'], 'data returned');
    }


    // Blogs
    public function getAllBlogs() {
        $blogs = Blog::all();
        return $this->returnData('blogs', $blogs, 'data returned');
    }
    /// Single Blog
    public function getSingleBlog(Request $request) {
        $blog = Blog::find($request->id);
        return $this->returnData('blog', $blog, 'data returned');
    }

    // Categories
    public function getCategories() {
        $categories = Category::all();
        return $this->returnData('categories', $categories, 'data returned');
    }
    // Courses Of Category Name
    public function getCoursesByCategoryName(Request $request, $category) {
        $category = Category::where('name', $category)->get()[0];
        $courses = $category->courses;
        return $this->returnData('courses', $courses, 'data returned');
    }

    // Courses Of Category id
    public function getCoursesByCategoryId(Request $request, $id) {
        $category = Category::find($id);
        $courses = $category->courses;
        // $courses = Course::where('category_id', $category->id);
        return $this->returnData('courses', $courses, 'data returned');
    }

    /// Single Course
    public function getSingleCourse(Request $request, $id) {
        $course = Course::find($id);
        $course->coursePage;
        $course->coursePage->includes_titles = json_decode($course->coursePage->includes_titles);
        $course->coursePage->includes_icons = json_decode($course->coursePage->includes_icons);
        $course->coursePage->content = json_decode($course->coursePage->content);
        $course->coursePage->share_links_urls = json_decode($course->coursePage->share_links_urls);
        $course->coursePage->share_links_icons = json_decode($course->coursePage->share_links_icons);
        return $this->returnData('course', $course, 'data returned');
    }

    // Projects
    public function getAllProjects() {
        $projects = Project::all();
        return $this->returnData('projects', $projects, 'data returned');
    }
    /// Single Project
    public function getSingleProject(Request $request) {
        $project = Project::find($request->id);
        $project->projectPage;
        return $this->returnData('project', $project, 'data returned');
    }
}
