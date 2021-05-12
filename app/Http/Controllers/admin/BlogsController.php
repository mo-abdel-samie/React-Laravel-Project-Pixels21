<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.show_blogs', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'author'=>'required|string',
            'content'=>'required|string|min:10|max:5000',
            'image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
        ]);


        $fileNameWithExt = $validated['image']->getClientOriginalName();
        // Delete old file
        $exists = Storage::disk('local')->exists('public/images/blogs/'.$fileNameWithExt);
        if ($exists) {
            Storage::delete('public/images/blogs/'.$fileNameWithExt);
        }
        // Upload new file
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $validated['image']->getClientOriginalExtension();
        $fileNameToStore = $fileName.'.'.$extension;
        $path = $validated['image']->storeAs('public/images/blogs', $fileNameToStore);
        $validated['image'] = $path;

        Blog::create($validated);

        return redirect()->route('blogs.index');
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
        $blog = Blog::find($id);
        return view('admin.blogs.edit_blog_form', ['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'author'=>'required|string',
            'content'=>'required|string|min:10|max:5000',
            'image'=>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
        ]);
        if (array_key_exists('image', $validated)) {
            $fileNameWithExt = $validated['image']->getClientOriginalName();
            // Delete old file
            $exists = Storage::disk('local')->exists('public/images/blogs/'.$fileNameWithExt);
            if ($exists) {
                Storage::delete('public/images/blogs/'.$fileNameWithExt);
            }
            // Upload new file
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $validated['image']->getClientOriginalExtension();
            $fileNameToStore = $fileName.'.'.$extension;
            $path = $validated['image']->storeAs('public/images/blogs', $fileNameToStore);
            $validated['image'] = $path;
        } else {
            $blog = Blog::find($id);
            $validated['image'] = $blog->image;
        }

        Blog::where('id', $id)->update($validated);

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        Blog::where('id', $id)->delete();
        return redirect()->route('blogs.index');
    }
}
