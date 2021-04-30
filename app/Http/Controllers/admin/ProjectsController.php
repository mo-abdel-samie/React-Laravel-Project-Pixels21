<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\admin\ProjectsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
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
    public function store(Request $request)
    {
        $validatedProject =  $request->validate([
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
        ]);
        $validatedProjectPage=  $request->validate([
            'content'=>'required',
        ]);

        $fileNameWithExt = $validatedProject['image']->getClientOriginalName();
        // Delete old file
        $exists = Storage::disk('local')->exists('public/images/projects/'.$fileNameWithExt);
        if ($exists) {
            Storage::delete('public/images/projects/'.$fileNameWithExt);
        }
        // Upload new file
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $validatedProject['image']->getClientOriginalExtension();
        $fileNameToStore = $fileName.'.'.$extension;
        $path = $validatedProject['image']->storeAs('public/images/projects', $fileNameToStore);
        $validatedProject['image'] = $path;

        $project = Project::create($validatedProject);

        $validatedProjectPage['project_id'] = $project->id;
        ProjectsPage::create($validatedProjectPage);

        return redirect()->route('projects.index');
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
    public function uploadImage(Request $request) {
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
        $validatedProject =  $request->validate([
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'image'=>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
        ]);
        $validatedProjectPage=  $request->validate([
            'content'=>'required',
        ]);

        if(array_key_exists('image', $validatedProject)) {
            $fileNameWithExt = $validatedProject['image']->getClientOriginalName();
            // Delete old file
            $exists = Storage::disk('local')->exists('public/images/projects/'.$fileNameWithExt);
            if ($exists) {
                Storage::delete('public/images/projects/'.$fileNameWithExt);
            }
            // Upload new file
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $validatedProject['image']->getClientOriginalExtension();
            $fileNameToStore = $fileName.'.'.$extension;
            $path = $validatedProject['image']->storeAs('public/images/projects', $fileNameToStore);
            $validatedProject['image'] = $path;
        } else {
            $project = Project::find($id);
            $validatedProject['image'] = $project->image;
        }
        Project::where('id',$id)->update($validatedProject);

        ProjectsPage::where('project_id',$id)->update($validatedProjectPage);

        return redirect()->route('projects.index');
    }

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
