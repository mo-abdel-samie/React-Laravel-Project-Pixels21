<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\projects\CreateProjectRequest;
use App\Http\Requests\projects\UpdateProjectRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\admin\Project;
use App\Models\admin\ProjectsPage;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.show_projects', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $imagePath = $this->saveImage($request->image , 'images/imgUploaded');

        $project = Project::create([
            'title'=> $request->title,
            'subtitle'=> $request->subtitle,
            'image'=> $imagePath,
        ]);
        $projectPage = ProjectsPage::create([
            'project_id'=> $project->id,
            'content'=> $request->content,
        ]);

        if ($project && $projectPage)
            return response()->json([
                'status' => true,
            ]);

        else
            return response()->json([
                'status' => false,
            ]);
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
        $project = Project::find($id);
        return view('admin.projects.edit_project_form', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(UpdateProjectRequest $request) {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/images/projects', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/projects/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            dd($msg);
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if($request->hasFile('image')){
            $imagePath = $this->saveImage($request->image , 'images/imgUploaded');
        }else {
            $imagePath = $project->image;
        }

        $project = Project::where('id',$id)->update([
            'title'=> $request->title,
            'subtitle'=> $request->subtitle,
            'image'=> $imagePath,
        ]);

         $projectPage = ProjectsPage::where('project_id',$id)->update([
            'content'=> $request->content,
        ]);

        if ($project && $projectPage)
            return response()->json([
                'status' => true,
            ]);

        else
            return response()->json([
                'status' => false,
            ]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id', $id)->delete();
        return redirect()->route('projects.index');
    }
}
