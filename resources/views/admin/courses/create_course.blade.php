@extends('admin.layout')

@section('content')
    <h1 class="mb-5">Create Course :</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data" class="col-6">
            @csrf
            <div class="main mb-5">
                <div class="form-group">
                    <label for="name" >Name :</label>
                    <input type="text" name="name" placeholder="Name" id="name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="category" >Category :</label>
                    <input type="text" name="category" placeholder="Category" id="category" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="rate" >Rate :</label>
                    <input type="number" name="rate" placeholder="Rate" id="rate" class="form-control"/>
                </div>

                <div class="">
                    <label>course-image :</label>
                    <input type="file" name="image" id="course-image" class="form-control"/>
                </div>
            </div>

            <div class="details">
                <div class="form-group">
                    <label for="header_desc" >header_desc :</label>
                    <input type="text" name="header_desc" placeholder="header_desc" id="header_desc" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="description" >description :</label>
                    <input type="text" name="description" placeholder="description" id="description" class="form-control"/>
                </div>

                <div class="form-group contents">
                    <button type="button" onclick="addContent(event)" class="add">Add Input</button>
                    <input type="text" name="content[]" placeholder="content" id="content" class="form-control"/>
                </div>

                <div class="form-group contents">
                    <button type="button" onclick="addInclude(event)" class="add">Add Input</button>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="includes_titles[]" placeholder="title" id="title" class="form-control"/>
                        </div>
                        <div class="col">
                            <input type="text" name="includes_icons[]" placeholder="icon" id="icon" class="form-control"/>
                        </div>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        function addContent(event) {
            const parent = event.target.parentElement;
            parent.innerHTML += `<input type="text" name="content[]" placeholder="content" id="content" class="form-control"/>`;
        }

        function addInclude(event) {
            const parent = event.target.parentElement;
            parent.innerHTML += `<div class="row">
                    <div class="col">
                        <input type="text" name="includes_titles[]" placeholder="title" id="title" class="form-control"/>
                    </div>
                    <div class="col">
                        <input type="text" name="includes_icons[]" placeholder="icon" id="icons" class="form-control"/>
                    </div>
                </div>`;
        }
    </script>
@endsection
