@extends('admin.layout')

@section('content')
<table class="table">
    <thead class="text-center">
        <th class="text-light" colspan="2">Section Name</th>
    </thead>
    <tbody>
        @foreach($sections as $section)
            <tr>
                <td >{{$section->section_name}}</td>
                <td class="text-right"><a class="btn btn-primary" href="{{route('admin.sections.sectionForm', ['id'=>$section->id])}}">Update</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection