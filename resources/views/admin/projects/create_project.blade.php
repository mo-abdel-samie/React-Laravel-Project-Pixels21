@extends('admin.layout')

@section('content')
    <h1>Create Article :</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data" class="col-6">
            @csrf
            <div class="main mb-5">
                <div class="form-group">
                    <label for="title" >Title :</label>
                    <input type="text" name="title" placeholder="Title" id="title" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="subtitle" >Subtitle :</label>
                    <input type="text" name="subtitle" placeholder="Subtitle" id="subtitle" class="form-control"/>
                </div>

                <div>
                    <label for="project-image" >projetc-image :</label>
                    <input type="file" name="image" id="project-image" class="form-control"/>
                </div>
            </div>

            <div class="project-UI">
                <textarea class="form-control" id="content" name="content"></textarea>
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
