@extends('admin.layout')

@section('content')
    <div class="card card-nav-tabs">
        <h1 class="card-header card-header-info">Edit Article :</h1>

        <div class="alert alert-success" id="success_msg" style="display: none;">
            Updated Successfully
        </div>

        <div class="alert alert-danger" id="danger_msg" style="display: none;">
            Failed to update
        </div>

        <div class="card-body py-5">
            <div class="row justify-content-center w-100">
                <form id="ajaxForm" method="POST" action="{{route('blogs.update', $blog->id)}}" enctype="multipart/form-data" class="col-6">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title" >Title :</label>
                        <input type="text" name="title" value="{{$blog->title}}" placeholder="Title" id="title" class="ajax form-control"/>
                        <small id="title_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="subtitle" >Subtitle :</label>
                        <input type="text" name="subtitle" value="{{$blog->subtitle}}" placeholder="Subtitle" id="subtitle" class="ajax form-control"/>
                        <small id="subtitle_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="author" >Author :</label>
                        <input type="text" name="author" value="{{$blog->author}}" placeholder="Author" id="author" class="ajax form-control"/>
                        <small id="author_error" class="form-text text-danger"></small>
                    </div>

                    <div class="">
                        <label for="blog-image" >blog-image :</label>
                        <input type="file" name="image" id="blog-image" class="ajax form-control"/>
                        <img src="{{asset($blog->image)}}" style="width: 7rem;">
                        <small id="image_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="language" >Content language</label>
                        <select name="language" class="ajax">
                            <optgroup class="text-info" label="Select Language">
                                <option value="ar" @if($blog->language === 'ar') selected @endif>Arabic</option>
                                <option value="en" @if($blog->language === 'en') selected @endif>English</option>
                            </optgroup>
                        </select>
                        <small id="language_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="content" >Content</label>
                        <textarea type="text" name="content" placeholder="Content" id="content" class="ajax form-control">{{$blog->content_en}}</textarea>
                        <small id="content_error" class="form-text text-danger"></small>
                    </div>

                    <button id="update_blog" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
