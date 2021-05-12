@extends('admin.layout')

@section('content')

<div class="card card-nav-tabs">
    <h4 class="card-header card-header-info">Create Course :</h4>
    <div class="card-body py-5">
        <div class="row justify-content-center w-100">
            <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data" class="col-6">
                @csrf
                <div class="main mb-5">
                    <div class="form-group @error('name') has-error @enderror">
                        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" id="name" class="form-control"/>
                        @error('name')
                            <span class="text-danger" role="alert">
                                {{ $message }}                      
                            </span>
                        @enderror
                    </div>
                    

                    <div class="form-group  @error('category') has-error @enderror">
                        <input type="text" name="category" placeholder="Category" value="{{ old('category') }}" id="category" class="form-control"/>
                        @error('category')
                            <span class="text-danger" role="alert">
                                {{ $message }}                      
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group @error('rate') has-error @enderror">
                        <input type="number" name="rate" placeholder="Rate" id="rate" value="{{ old('rate') }}" class="form-control"/>
                        @error('rate')
                            <span class="text-danger" role="alert">
                                {{ $message }}                      
                            </span>
                        @enderror
                    </div>
    
                    <div class="" @error('image') has-error @enderror>
                        <input type="file" name="image" id="course-image" value="{{ old('image') }}" class="form-control"/>
                        @error('image')
                            <span class="text-danger" role="alert">
                                {{ $message }}                      
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="details">
                    <div class="form-group @error('header_desc') has-error @enderror">
                        <input type="text" name="header_desc" placeholder="header_desc" value="{{ old('header_desc') }}" id="header_desc" class="form-control mb-2"/>
                        @error('header_desc')
                            <span class="text-danger" role="alert">
                                {{ $message }}                      
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group @error('description') has-error @enderror">
                        <input type="text" name="description" placeholder="description" value="{{ old('description') }}" id="description" class="form-control mb-2"/>
                        @error('description')
                            <span class="text-danger" role="alert">
                                {{ $message }}                      
                            </span>
                        @enderror
                    </div>
    
                    <div>
                        <h3>List Of Content</h3>
                        <button type="button" onclick="addContent(event)" class="add btn btn-info">Add Input</button>
                        <div class="form-group  contents @error('content') has-error @enderror">
                            <input type="text" name="content[]" placeholder="content" value="{{ old('content.0') }}" id="content" class="form-control mb-2"/>
                        </div>
                        @error('content.0')
                            <span class="text-danger" role="alert">
                                {{ $message }}                      
                            </span>
                        @enderror
                    </div>
                    
    
                    <div class="contents">
                        <h3>This course include</h3>
                        <button type="button" onclick="addInclude(event)" class="add btn btn-info">Add Input</button>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="includes_titles[]" placeholder="title" value="{{ old('includes_titles.0') }}"  id="title" class="form-control mb-2 @error('includes_titles') has-error @enderror"/>
                                @error('includes_titles.0')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}                      
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <input type="text" name="includes_icons[]" placeholder="icon" value="{{ old('includes_icons.0') }}"  id="icon" class="form-control mb-2 @error('includes_icons') has-error @enderror"/>
                                @error('includes_icons.0')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}                      
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                </div>
    
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary pill">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>

   

    <script>
        function addContent(event) {
            const parent = event.target.parentElement;
            parent.innerHTML += `<div class="form-group  contents">
                        <input type="text" name="content[]" placeholder="content" id="content" class="form-control mb-2"/>
                    </div>`;
        }

        function addInclude(event) {
            const parent = event.target.parentElement;
            parent.innerHTML += `<div class="row">
                    <div class="col">
                        <input type="text" name="includes_titles[]" placeholder="title" id="title" class="form-control mb-2"/>
                    </div>
                    <div class="col">
                        <input type="text" name="includes_icons[]" placeholder="icon" id="icons" class="form-control mb-2"/>
                    </div>
                </div>`;
        }
    </script>
@endsection
