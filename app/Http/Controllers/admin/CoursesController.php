<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\courses\CreateCourseRequest;
use App\Http\Requests\courses\UpdateCourseRequest;
use App\Models\admin\Category;
use App\Models\admin\Course;
use App\Models\admin\CoursesPage;
use App\Http\Traits\GeneralTrait;

class CoursesController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('admin.courses.show_courses', ['courses'=>$courses, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create_course', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {

        $courseImagePath = $this->saveImage($request->image , 'images/imgUploaded');
        $courseHeaderImagePath = $this->saveImage($request->header_image , 'images/imgUploaded');

        //Save Data To New Row
        $course = Course::create([
            'name'=> $request->name,
            'category_id'=> $request->category_id,
            'rate'=> $request->rate,
            'image'=> $courseImagePath,
        ]);


        $coursePage = CoursesPage::create([
            'header_image'=> $courseHeaderImagePath,
            'header_desc'=> $request->header_desc,
            'description'=> $request->description,
            'includes_titles'=> json_encode($request->includes_titles),
            'includes_icons'=> json_encode($request->includes_icons),
            'content'=> json_encode($request->content),
            'share_links_urls'=> json_encode($request->share_links_urls),
            'share_links_icons'=> json_encode($request->share_links_icons),
            'average_rate'=> $request->average_rate,
            'course_id'=> $course->id,
        ]);

        if ($course && $coursePage)
            return response()->json([
                'status' => true,
            ]);
        else
            return response()->json([
                'status' => false,
            ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $course->header_image  = $course->coursePage->header_image;
        $course->header_desc  = $course->coursePage->header_desc;
        $course->description  = $course->coursePage->description;
        $course->average_rate  = $course->coursePage->average_rate;
        $course->includes_titles  = json_decode($course->coursePage->includes_titles);
        $course->includes_icons  = json_decode($course->coursePage->includes_icons);
        $course->content  = json_decode($course->coursePage->content);
        $course->share_links_urls = json_decode($course->coursePage->share_links_urls);
        $course->share_links_icons = json_decode($course->coursePage->share_links_icons);
        $course->category_id = $course->category->id;
        $categories = Category::all();
        return view('admin.courses.edit_course_form', ['course'=>$course, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        $course = Course::find($id);

        if($request->hasFile('image')){
            $courseImagePath = $this->saveImage($request->image , 'images/imgUploaded');
            $courseHeaderImagePath = $this->saveImage($request->header_image , 'images/imgUploaded');
        } else {
            $courseImagePath = $course->image;
            $courseHeaderImagePath = $course->coursePage->header_image;
        }

        //Update Data To New Row
        $course = Course::where('id', $id)->update([
            'name'=>             $request->name,
            'category_id'=> $request->category_id,
            'rate'=>             $request->rate,
            'image'=>            $courseImagePath,
        ]);

        $coursePage = CoursesPage::where('course_id', $id)->update([
            'header_image'=>     $courseHeaderImagePath,
            'header_desc'=>        $request->header_desc,
            'description'=>        $request->description,
            'average_rate'=>       $request->average_rate,
            'includes_titles'=>    json_encode($request->includes_titles),
            'includes_icons'=>     json_encode($request->includes_icons),
            'content'=>            json_encode($request->content),
            'share_links_urls'=>   json_encode($request->share_links_urls),
            'share_links_icons'=>  json_encode($request->share_links_icons),
        ]);

        if ($course && $coursePage)
            return response()->json([
                'status' => true,
            ]);
        else
            return response()->json([
                'status' => false,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where('id', $id)->delete();
        return redirect()->route('courses.index');
    }
}
