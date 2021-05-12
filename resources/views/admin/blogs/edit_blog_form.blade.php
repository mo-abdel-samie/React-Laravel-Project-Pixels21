@extends('admin.layout')
@section('content')
    {{--    {{dd([$sectionInputTypes, $data])}}--}}
    <h1>Edit Article :</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('blogs.update', $blog->id)}}" method="post" enctype="multipart/form-data" class="col-6">
            @csrf
            @method('PUT')
            <div class="form-group mb-5">
                <label for="title" >Title :</label>
                <input type="text" name="title" value="{{$blog->title}}" placeholder="Title" id="title" class="form-control"/>
            </div>

            <div class="form-group mb-5">
                <label for="subtitle" >Subtitle :</label>
                <input type="text" name="subtitle" value="{{$blog->subtitle}}" placeholder="Subtitle" id="subtitle" class="form-control"/>
            </div>

            <div class="form-group mb-5">
                <input type="text" name="author" value="{{$blog->author}}" placeholder="Author" id="author" class="form-control"/>
            </div>


            <div class="form-group mb-5">
                <label for="content">Content :</label>
                <textarea name="content" placeholder="Must be between " id="content" cols="70" rows="6" >{{$blog->content}}</textarea>
            </div>

            <div class="mb-5">
                <img src="{{\Illuminate\Support\Facades\Storage::disk('local')->url($blog->image)}}" class="w-25" alt="article" />
                <input type="file" name="image" id="image" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
