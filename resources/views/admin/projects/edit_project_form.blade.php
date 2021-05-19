@extends('admin.layout')

@section('content')
    <div class="card card-nav-tabs">
        <h1 class="card-header card-header-info">Edit project :</h1>

        <div class="alert alert-success" id="success_msg" style="display: none;">
            Updated Successfully
        </div>

        <div class="alert alert-danger" id="danger_msg" style="display: none;">
            Failed to update
        </div>

        <div class="card-body py-5">
            <div class="row justify-content-center w-100">
                <form id="ajaxForm" action="{{route('projects.update', $project->id)}}" method="post" enctype="multipart/form-data" class="col-6">
                    @csrf
                    @method('PATCH')
                    <div class="main mb-5">
                        <div class="form-group">
                            <label for="title" >Title :</label>
                            <input type="text" name="title" placeholder="Title" id="title" class="ajax form-control"/>
                            <small id="title_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="subtitle" >Subtitle :</label>
                            <input type="text" name="subtitle" placeholder="Subtitle" id="subtitle" class="ajax form-control"/>
                            <small id="subtitle_error" class="form-text text-danger"></small>
                        </div>

                        <div>
                            <label for="project-image" >projetc-image :</label>
                            <input type="file" name="image" id="image" class="ajax form-control"/>
                            <small id="image_error" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="project-UI">
                        <textarea class="ajax form-control" id="content" name="content"></textarea>
                        <small id="content_error" class="form-text text-danger"></small>
                    </div>
                    <button id="update_project" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl: "{{route('editorImageUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
