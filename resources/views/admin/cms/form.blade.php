@extends('admin.layout')
@section('content')
{{--    {{dd([$sectionInputTypes, $data])}}--}}
    <h1>{{$section_name}}</h1>
    <div class="row justify-content-center w-100">
        <form action="{{route('admin.slogan.update', ['id'=>$id])}}" method="post" enctype="multipart/form-data" class="col-6">
            @csrf
            @foreach($sectionInputTypes as $type => $inputs)
{{--                {{dd($inputs)}}--}}
                <div class="type mb-5">
                    <label class="text-light font-weight-bolder text-capitalize">{{$type}} :</label><br>
                    @foreach($inputs as $input => $value)
{{--                        {{dd($input)}}--}}
                        @if($type === 'file')
                            <label class="font-weight-bolder text-capitalize">{{$input}} :</label>
                            <img src="{{$data[$input]}}" />
                        @endif
                        <input type="{{$type}}" name="{{$input}}" value="{{$data[$input]}}" placeholder="{{$input}}" class="form-control"/>
                    @endforeach
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
