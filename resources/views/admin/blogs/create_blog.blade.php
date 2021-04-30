@extends('admin.layout')

@section('content')
    <h1>Create Article :</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data" class="col-6">
            @csrf
            <div class="form-group">
                <label for="title" >Title :</label>
                <input type="text" name="title" placeholder="Title" id="title" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="subtitle" >Subtitle :</label>
                <input type="text" name="subtitle" placeholder="Subtitle" id="subtitle" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="author" >Author :</label>
                <input type="text" name="author" placeholder="Author" id="author" class="form-control"/>
            </div>

            <div class="">
                <label for="blog-image" >blog-image :</label>
                <input type="file" name="image" id="blog-image" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="content" >Content</label>
                <input type="text" name="content" placeholder="Content" id="content" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
