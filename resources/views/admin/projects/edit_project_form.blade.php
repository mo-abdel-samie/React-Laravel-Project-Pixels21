@extends('admin.layout')
@section('content')
    {{--    {{dd([$sectionInputTypes, $data])}}--}}
    <h1>Edit Article :</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('projects.update', $project->id)}}" method="post" enctype="multipart/form-data" class="col-6">

            @csrf
            @method('PUT')

            <div class="form-group mb-5">
                <label for="title" >Title :</label>
                <input type="text" name="title" value="{{$project->title}}" placeholder="Title" id="title" class="form-control"/>
            </div>

            <div class="form-group mb-5">
                <label for="subtitle" >Subtitle :</label>
                <input type="text" name="subtitle" value="{{$project->subtitle}}" placeholder="Subtitle" id="subtitle" class="form-control"/>
            </div>

            <div class="mb-5">
                <img src="{{\Illuminate\Support\Facades\Storage::disk('local')->url($project->image)}}" class="w-25" alt="article" />
                <input type="file" name="image" id="image" class="form-control"/>
            </div>

            <div class="project-UI">
                <textarea class="form-control" id="content" name="content">{{$project->content}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl: "{{route('editorImageUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
