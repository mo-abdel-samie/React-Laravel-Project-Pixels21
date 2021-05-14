@extends('admin.layout')

@section('content')

    <div class="card card-nav-tabs">
        <h1 class="card-header card-header-info">Create Project :</h1>

        <div class="alert alert-success" id="success_msg" style="display: none;">
            Updated Successfully
        </div>

        <div class="alert alert-danger" id="danger_msg" style="display: none;">
            Failed to update
        </div>

        <div class="card-body py-5">
            <div class="row justify-content-center w-100">
                <form id="saveProjectForm" method="post" enctype="multipart/form-data" class="col-6">
                    @csrf
                    <div class="main mb-5">
                        <div class="form-group">
                            <label for="title" >Title :</label>
                            <input type="text" name="title" placeholder="Title" id="title" class="form-control"/>
                            <small id="title_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="subtitle" >Subtitle :</label>
                            <input type="text" name="subtitle" placeholder="Subtitle" id="subtitle" class="form-control"/>
                            <small id="subtitle_error" class="form-text text-danger"></small>
                        </div>

                        <div>
                            <label for="project-image" >projetc-image :</label>
                            <input type="file" name="image" id="image" class="form-control"/>
                            <small id="image_error" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="project-UI">
                        <textarea class="form-control" id="content" name="content"></textarea>
                        <small id="content_error" class="form-text text-danger"></small>
                    </div>
                    <button id="save_project" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl: "{{route('editorImageUpload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection

@section('scripts')
    <script>

        $(document).on('click', '#save_project', function (e) {
            e.preventDefault();

            $('#title_error').text('');
            $('#subtitle_error').text('');
            $('#image_error').text('');
            $('#content_error').text('');

            var formData = new FormData($('#saveProjectForm')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('projects.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                        $('#danger_msg').hide();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                    $('#danger_msg').show();
                    $('#success_msg').hide();
                }
            });
        });


    </script>
@stop
