@extends('admin.layout')

@section('content')

<div class="card card-nav-tabs">
    <h1 class="card-header card-header-info">Create Course :</h1>

    <div class="alert alert-success" id="success_msg" style="display: none;">
        Created Successfully
    </div>

    <div class="alert alert-danger" id="danger_msg" style="display: none;">
        Failed to create
    </div>

    <div class="card-body py-5">
        <div class="row justify-content-center w-100">
            <form id="saveCourseForm" method="post" enctype="multipart/form-data" class="col-6">
                @csrf
                <div class="main mb-5">
                    <div class="form-group">
                        <label for="name" >name :</label>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control"/>
                        <small id="name_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="category" >category :</label>
                        <input type="text" name="category" placeholder="category" id="category" class="form-control"/>
                        <small id="category_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="rate" >rate :</label>
                        <input type="number" name="rate" placeholder="rate" id="rate" class="form-control"/>
                        <small id="rate_error" class="form-text text-danger"></small>
                    </div>

                    <div class="">
                        <label for="image" >image :</label>
                        <input type="file" name="image" placeholder="image" id="image" class="form-control"/>
                        <small id="image_error" class="form-text text-danger"></small>
                    </div>
                </div>

                <div class="details">
                    <div class="">
                        <label for="header_image" >header_image :</label>
                        <input type="file" name="header_image" placeholder="header_image" id="header_image" class="form-control"/>
                        <small id="header_image_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="header_desc" >header_desc :</label>
                        <input type="text" name="header_desc" placeholder="header_desc" id="header_desc" class="form-control"/>
                        <small id="header_desc_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="description" >description :</label>
                        <input type="text" name="description" placeholder="description" id="description" class="form-control"/>
                        <small id="description_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="average_rate" >average_rate :</label>
                        <input type="number" name="average_rate" placeholder="average_rate" id="average_rate" class="form-control"/>
                        <small id="average_rate_error" class="form-text text-danger"></small>
                    </div>

                    <div class="share-links">
                        <h3>share links :</h3>
                        <div class="form-group">
                            <input type="url" name="share_links[]" placeholder="average_rate" id="average_rate" class="form-control"/>
                            <small id="average_rate_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <input type="url" name="share_links[]" placeholder="average_rate" id="average_rate" class="form-control"/>
                            <small id="average_rate_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <input type="url" name="share_links[]" placeholder="average_rate" id="average_rate" class="form-control"/>
                            <small id="average_rate_error" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="content">
                        <h3>Content</h3>
                        <button type="button" onclick="addContent(event)" class="add btn btn-info">Add Input</button>
                        <div class="form-group">
                            <input type="text" name="content[]" placeholder="Content" id="content" class="form-control"/>
                            <small id="content_error" class="form-text text-danger"></small>
                        </div>
                    </div>


                    <div class="includes">
                        <h3>This course include</h3>
                        <button type="button" onclick="addInclude(event)" class="add btn btn-info">Add Input</button>
                        <div class="row">
                            <div class="col">
                                <label for="title" >title :</label>
                                <input type="text" name="includes_titles[]" placeholder="title" id="includes_titles" class="form-control"/>
                                <small id="includes_titles_error" class="form-text text-danger"></small>
                            </div>

                            <div class="col">
                                <label for="icon" >icon :</label>
                                <input type="text" name="includes_icons[]" placeholder="icon" id="includes_icons" class="form-control"/>
                                <small id="includes_icons_error" class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button id="save_course" class="btn btn-primary pill">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>



    <script>
        function addContent(event) {
            const parent = event.target.parentElement;
            var node = document.createElement("DIV");
            node.className = "content";
            node.innerHTML = `
                    <input type="text" name="content[]" id="content" placeholder="content" class="form-control"/>
                    <small id="content_error" class="form-text text-danger"></small>`;
            parent.appendChild(node);
        }

        function addInclude(event) {
            const parent = event.target.parentElement;
            var node = document.createElement("DIV");
            node.className = "row";
            node.innerHTML = `
                    <div class="col">
                        <label for="title" >title :</label>
                        <input type="text" name="includes_titles[]" id="includes_titles" placeholder="title" class="form-control"/>
                        <small id="includes_titles_error" class="form-text text-danger"></small>
                    </div>

                    <div class="col">
                        <label for="title" >title :</label>
                        <input type="text" name="includes_icons[]" id="includes_icons" placeholder="icon" class="form-control"/>
                        <small id="includes_icons_error" class="form-text text-danger"></small>
                    </div>`;
            parent.appendChild(node);
        }
    </script>
@endsection


@section('scripts')
    <script>

        $(document).on('click', '#save_course', function (e) {
            e.preventDefault();

            $('#name_error').text('');
            $('#category_error').text('');
            $('#rate_error').text('');
            $('#image_error').text('');
            $('#header_desc_error').text('');
            $('#header_image_error').text('');
            $('#share_links_error').text('');
            $('#average_rate_error').text('');
            $('#content_error').text('');
            $('#includes_icons_error').text('');
            $('#includes_titles_error').text('');

            var formData = new FormData($('#saveCourseForm')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('courses.store')}}",
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
