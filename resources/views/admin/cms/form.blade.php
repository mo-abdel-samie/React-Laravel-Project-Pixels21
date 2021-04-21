@extends('admin.layout')
@section('content')
    <h1>{{$section->section_name}}</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('admin.slogan.update', ['id'=>$section->id])}}" method="post" enctype="multipart/form-data" class="col-6 text-center">
            @csrf
            @switch($section->section_name)
                @case('about_header')
                    @include('admin.cms.forms.about_header', ['data'=>$data])
                    @break
                @case('home_header')
                    @include('admin.cms.forms.home_header', ['data'=>$data])
                    @break
                @case('slogan')
                    @include('admin.cms.forms.slogan', ['data'=>$data])
                    @break
                @case('about')
                    @include('admin.cms.forms.about', ['data'=>$data])
                    @break
                @case('about_slogan')
                    @include('admin.cms.forms.about_slogan', ['data'=>$data])
                    @break
            @endswitch
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
