<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.courses.show_courses', ['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create_course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request ,[
            'name'       =>'required|string',
            'category'   =>'required|string',
            'rate'       =>'required|numeric|min:0|max:10',
            'image'      =>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'header_desc'=>'required|string',
            'description'=>'required|string',
            'content.*'   =>'required|string',
            'includes_titles.*'=>'required|string',
            'includes_icons.*'=>'required|string',
        ]);

        if(!$validator){
            return redirect()->back()->withFlash();
        }

        $imagePath = $this->saveImage($request->image , 'images/imgUploaded');
        
        //Save Data To New Row
        $course = new Course;
        $course->name            = $request->input('name');
        $course->category        = $request->input('category');
        $course->rate            = $request->input('rate');
        $course->image           = $imagePath;
        $course->header_desc     = $request->input('header_desc');
        $course->description     = $request->input('description');
        $course->content         = json_encode($request->input('content')) ;
        $course->includes_titles = json_encode($request->input('includes_titles'));
        $course->includes_icons  = json_encode($request->input('includes_icons'));
        $course->save();
        
        return redirect()->route('courses.index');

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
        $course->content = json_decode($course->content);
        $course->includes_titles = json_decode($course->includes_titles);
        $course->includes_icons = json_decode($course->includes_icons);
        return view('admin.courses.edit_course_form', ['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        
        $validator = $this->validate($request ,[
            'name'       =>'required|string',
            'category'   =>'required|string',
            'rate'       =>'required|numeric|min:0|max:10',
            'image'      =>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'header_desc'=>'required|string',
            'description'=>'required|string',
            'content.*'   =>'required|string',
            'includes_titles.*'=>'required|string',
            'includes_icons.*'=>'required|string',
        ]);

        if(!$validator){
            return redirect()->back()->withFlash();
        }
       

        if($request->hasFile('image')){
            $imagePath = $this->saveImage($request->image , 'images/imgUploaded');
        }else {
            $imagePath = $course->image;
        }

        
        $course->name            = $request->input('name');
        $course->category        = $request->input('category');
        $course->rate            = $request->input('rate');
        $course->image           = $imagePath;
        $course->header_desc     = $request->input('header_desc');
        $course->description     = $request->input('description');
        $course->content         = json_encode($request->input('content')) ;
        $course->includes_titles = json_encode($request->input('includes_titles'));
        $course->includes_icons  = json_encode($request->input('includes_icons'));
        $course->save();


        return redirect()->route('courses.index');
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
