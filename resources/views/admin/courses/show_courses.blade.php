@extends('admin.layout')

@section('content')
    <table class="table">
        <thead class=" text-primary">
            <th>Name</th>
            <th>Category</th>
            <th>Rate</th>
            <th>Image</th>
            <th>Processes</th>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{$course->name}}</td>
                    <td>{{$course->category}}</td>
                    <td>{{$course->rate}}</td>
                    <td><img style="width: 7rem;" src="{{\Illuminate\Support\Facades\Storage::disk('local')->url($course->image)}}" alt="blog" /></td>
                    <td>
                        <a class="btn btn-primary" href="{{route('courses.edit', $course->id)}}">Edit</a>
                        <form method="post" class="d-inline-block" action="{{route('courses.destroy', $course->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are You sure?')" class="btn btn-light" >Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
