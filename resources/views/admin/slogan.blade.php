@extends('admin.layout')

@section('content')
    <h1>Slogan</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('admin.slogan.update', ['id'=>$data->id])}}" method="post" enctype="multipart/form-data" class="col-6">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" name="title1" value="{{$data->section_content}}" class="form-control" placeholder="Title1">
                </div>
                <div class="col">
                    <input type="file" name="image1" value="{{$data->section_content}}" class="form-control" placeholder="Image1">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" name="title2" value="{{$data->section_content}}" class="form-control" placeholder="Title2">
                </div>
                <div class="col">
                    <input type="file" name="image2" value="{{$data->section_content}}" class="form-control" placeholder="Image2">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" name="title3" value="{{$data->section_content}}" class="form-control" placeholder="Title3">
                </div>
                <div class="col">
                    <input type="file" name="image3" value="{{$data->section_content}}" class="form-control" placeholder="Image3">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


<div class="form-group">
    <label for="exampleInput1" class="bmd-label-floating">With Floating Label</label>
    <input type="email" class="form-control" id="exampleInput1">
    <span class="bmd-help">We'll never share your email with anyone else.</span>
</div>
