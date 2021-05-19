<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\blogs\CreateBlogRequest;
use App\Http\Requests\blogs\UpdateBlogRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\admin\Blog;


class BlogsController extends Controller
{
    use GeneralTrait;

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
    public function store(CreateBlogRequest $request)
    {
        $imagePath = $this->saveImage($request->image , 'images/imgUploaded');

        $blog = Blog::create([
            'title'=> $request->title,
            'subtitle'=> $request->subtitle,
            'author'=> $request->author,
            'content'=> $request->content,
            'language'=> $request->language,
            'image'=> $imagePath,
        ]);

        if ($blog)
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
    public function update(UpdateBlogRequest $request, $id)
    {
        $blog = Blog::find($id);

        if ($request->hasFile('image')) {
            $imagePath = $this->saveImage($request->image , 'images/imgUploaded');
        } else {
            $imagePath = $blog->image;
        }

        $blog = Blog::where('id', $id)->update([
            'title'=> $request->title,
            'subtitle'=> $request->subtitle,
            'author'=> $request->author,
            'content'=> $request->content,
            'language'=> $request->language,
            'image'=> $imagePath,
        ]);

        if ($blog)
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
//        dd($id);
        Blog::where('id', $id)->delete();
        return redirect()->route('blogs.index');
    }
}
