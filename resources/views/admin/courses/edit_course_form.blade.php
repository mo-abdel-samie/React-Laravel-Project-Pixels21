@extends('admin.layout')

@section('content')

    <div class="card card-nav-tabs">
        <h1 class="card-header card-header-info">Update Course :</h1>

        <div class="alert alert-success" id="success_msg" style="display: none;">
            Updated Successfully
        </div>

        <div class="alert alert-danger" id="danger_msg" style="display: none;">
            Failed to update
        </div>

        <div class="card-body py-5">
            <div class="row justify-content-center w-100">
                <form id="ajaxForm" action="{{route('courses.update', $course->id)}}" method="post" enctype="multipart/form-data" class="col-6">
                    @csrf
                    @method('PATCH')
                    <div class="main mb-5">
                        <div class="form-group">
                            <label for="name" >name :</label>
                            <input type="text" name="name" id="name" value="{{$course->name}}" placeholder="Name" class="ajax form-control"/>
                            <small id="name_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="category" >category :</label>
                            <select name="category_id" placeholder="category" id="category_id" class="ajax form-control">
                                <optgroup class="text-info" label="Select Category">
                                    @foreach ($categories as $category)
                                        @if($category->id == $course->category_id)
                                            <option class="text-info" value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option class="text-info" value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            </select>
                            <small id="category_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="rate" >rate :</label>
                            <input type="number" name="rate" id="rate" value="{{$course->rate}}" placeholder="rate" class="ajax form-control"/>
                            <small id="rate_error" class="form-text text-danger"></small>
                        </div>

                        <div class="">
                            <label for="image" >image :</label>
                            <img src="{{asset($course->image)}}" style="width: 7rem;">
                            <input type="file" name="image" id="image" placeholder="image" class="ajax form-control"/>
                            <small id="image_error" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="details">
                        <div class="">
                            <label for="header_image" >header_image :</label>
                            <img src="{{asset($course->header_image)}}" style="width: 7rem;">
                            <input type="file" name="header_image" id="header_image" placeholder="header_image" class="ajax form-control"/>
                            <small id="header_image_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="header_desc" >header_desc :</label>
                            <input type="text" name="header_desc" id="header_desc" value="{{$course->header_desc}}" placeholder="header_desc" class="ajax form-control"/>
                            <small id="header_desc_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="description" >description :</label>
                            <input type="text" name="description" id="description" value="{{$course->description}}" placeholder="description" class="ajax form-control"/>
                            <small id="description_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="average_rate">average_rate :</label>
                            <input type="number" name="average_rate" id="average_rate" value="{{$course->average_rate}}" placeholder="average_rate" class="ajax form-control"/>
                            <small id="average_rate_error" class="form-text text-danger"></small>
                        </div>

                        <div class="share-links">
                            <h3>share links :</h3>

                        </div>
                        <div class="share-links-urls">
                            <h3>share links :</h3>
                            <button type="button" onclick="addShareLink(event)" class="add btn btn-info">Add Input</button>
                            @for($i=0; $i<count($course->share_links_urls); $i++)
                                <div class="row">
                                    <div class="col">
                                        <input type="url" name="share_links_urls[]" placeholder="Url" value="{{$course->share_links_urls[$i]}}" id="share_links_urls" class="ajax form-control"/>
                                        <small id="share_links_urls_error" class="form-text text-danger"></small>
                                    </div>

                                    <div class="col">
                                        <input type="text" name="share_links_icons[]" placeholder="Icon" value="{{$course->share_links_icons[$i]}}" id="share_links_icons" class="ajax form-control"/>
                                        <small id="share_links_icons_error" class="form-text text-danger"></small>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="contents">
                            <h3>Content List</h3>
                            <button type="button" onclick="addContent(event)" class="add btn btn-info">Add Input</button>
                            @foreach($course->content as $content)
                                <div class="form-group">
                                    <input type="text" name="content[]" id="content" value="{{$content}}" placeholder="Content" class="ajax form-control"/>
                                    <small id="content_error" class="form-text text-danger"></small>
                                </div>
                            @endforeach
                        </div>

                        <div class="includes">
                            <h3>Includes list</h3>
                            <button type="button" onclick="addInclude(event)" class="add btn btn-info">Add Input</button>
                            @for($i=0;$i<count($course->includes_titles);$i++)
                                <div class="row">
                                    <div class="col">
                                        <label for="title" >title :</label>
                                        <input type="text" name="includes_titles[]" id="includes_titles" value="{{$course->includes_titles[$i]}}" placeholder="title+{{$i}}" class="ajax form-control"/>
                                        <small id="includes_titles_error" class="form-text text-danger"></small>
                                    </div>
                                    <div class="col">
                                        <label for="icon" >icon :</label>
                                        <input type="text" name="includes_icons[]" id="includes_icons" value="{{$course->includes_icons[$i]}}" placeholder="icon+{{$i}}" class="ajax form-control"/>
                                        <small id="includes_icons_error" class="form-text text-danger"></small>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="mt-4">
                        <button id="update_course" class="btn btn-primary pill">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        function addShareLink(event) {
            const parent = event.target.parentElement;
            var node = document.createElement("DIV");
            node.className = "row";
            node.innerHTML = `
                <div class="col">
                    <input type="url" name="share_links_urls[]" placeholder="Url" id="share_links_urls" class="ajax form-control"/>
                    <small id="share_links_urls_error" class="form-text text-danger"></small>
                </div>

                <div class="col">
                    <input type="text" name="share_links_icons[]" placeholder="Icon" id="share_links_icons" class="ajax form-control"/>
                    <small id="share_links_icons_error" class="form-text text-danger"></small>
                </div>`;
            parent.appendChild(node);
        }
        function addContent(event) {
            const parent = event.target.parentElement;
            var node = document.createElement("DIV");
            node.className = "content";
            node.innerHTML = `
                    <input type="text" name="content[]" id="content" placeholder="content" class="ajax form-control"/>
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
                        <input type="text" name="includes_titles[]" id="includes_titles" placeholder="title" class="ajax orm-control"/>
                        <small id="includes_titles_error" class="form-text text-danger"></small>
                    </div>

                    <div class="col">
                        <label for="title" >title :</label>
                        <input type="text" name="includes_icons[]" id="includes_icons" placeholder="icon" class="ajax orm-control"/>
                        <small id="includes_icons_error" class="form-text text-danger"></small>
                    </div>`;
            parent.appendChild(node);
        }
    </script>
@endsection
