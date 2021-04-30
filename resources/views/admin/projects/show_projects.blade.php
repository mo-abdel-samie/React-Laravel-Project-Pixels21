@extends('admin.layout')

@section('content')
    <table class="table">
        <thead class=" text-primary">
            <th>Image</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Processes</th>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td><img style="width: 7rem;" src="{{\Illuminate\Support\Facades\Storage::disk('local')->url($project->image)}}" alt="project" /></td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->subtitle}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('projects.edit', $project->id)}}">Edit</a>
                        <form method="post" class="d-inline-block" action="{{route('projects.destroy', $project->id)}}">
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
