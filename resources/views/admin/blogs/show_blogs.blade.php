@extends('admin.layout')

@section('content')
    <table class="table">
        <thead class=" text-primary">
            <th>Image</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Author</th>
            <th>Processes</th>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td><img style="width: 7rem;" src="{{asset($blog->image)}}" alt="blog" /></td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->subtitle}}</td>
                    <td>{{$blog->author}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('blogs.edit', $blog->id)}}">Edit</a>
                        <form method="post" class="d-inline-block" action="{{route('blogs.destroy', $blog->id)}}">
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
