<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
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
        $courseValidated =  $request->validate([
            'name'=>'required|string',
            'category'=>'required|string',
            'rate'=>'required|digits_between:1,5',
            'image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
        ]);
        $courseDetails = $request->validate([
            'header_desc'=>'required|string',
            'description'=>'required|string',
            'content'=>'required|array',
        ]);
        $courseDetailsIncludes = $request->validate([
            'includes_titles'=>'required|array',
            'includes_icons'=>'required|array',
        ]);
        $courseDetails['includes'] = [
            'titles'=>array_values($courseDetailsIncludes['includes_titles']) ,
            'icons'=>array_values($courseDetailsIncludes['includes_icons'])
        ];
        $courseValidated['details'] = json_encode($courseDetails);


        $fileNameWithExt = $courseValidated['image']->getClientOriginalName();
        // Delete old file
        $exists = Storage::disk('local')->exists('public/images/courses/'.$fileNameWithExt);
        if ($exists) {
            Storage::delete('public/images/courses/'.$fileNameWithExt);
        }
        // Upload new file
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $courseValidated['image']->getClientOriginalExtension();
        $fileNameToStore = $fileName.'.'.$extension;
        $path = $courseValidated['image']->storeAs('public/images/courses', $fileNameToStore);
        $courseValidated['image'] = $path;

        Course::create($courseValidated);

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
        $course->details = json_decode($course->details);
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
        $courseValidated =  $request->validate([
            'name'=>'required|string',
            'category'=>'required|string',
            'rate'=>'required|digits_between:1,5',
            'image'=>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
        ]);
        $courseDetails = $request->validate([
            'header_desc'=>'required|string',
            'description'=>'required|string',
            'content'=>'required|array',
        ]);
        $courseDetailsIncludes = $request->validate([
            'includes_titles'=>'required|array',
            'includes_icons'=>'required|array',
        ]);
        $courseDetails['includes'] = [
            'titles'=>array_values($courseDetailsIncludes['includes_titles']) ,
            'icons'=>array_values($courseDetailsIncludes['includes_icons'])
        ];
        $courseValidated['details'] = json_encode($courseDetails);

        if(array_key_exists('image', $courseValidated)) {

        $fileNameWithExt = $courseValidated['image']->getClientOriginalName();
        // Delete old file
        $exists = Storage::disk('local')->exists('public/images/courses/'.$fileNameWithExt);
        if ($exists) {
            Storage::delete('public/images/courses/'.$fileNameWithExt);
        }
        // Upload new file
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $courseValidated['image']->getClientOriginalExtension();
        $fileNameToStore = $fileName.'.'.$extension;
        $path = $courseValidated['image']->storeAs('public/images/courses', $fileNameToStore);
        $courseValidated['image'] = $path;
        } else {
            $course = Course::find($id);
            $courseValidated['image'] = $course->image;
        }

        Course::where('id', $id)->update($courseValidated);

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
