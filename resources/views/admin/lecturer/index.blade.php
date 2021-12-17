@extends('layouts.admin')

@section('content')
    <h2 @class('text-center') >Lecturer Complaint</h2>
    @if(Session::has('updated_user') || Session::has('deleted_user') || Session::has('created_user'))
        <div class="text-center">
            <p class="bg-success">{{Session('created_user')}}</p>
            <p class="bg-primary">{{Session('updated_user')}}</p>
            <p class="bg-danger">{{Session('deleted_user')}}</p>
        </div>
    @endif
    @if(count($lecturers) > 0)
        <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Matric_no</th>
            <th scope="col">Course</th>
            <th scope="col">Course_course</th>
            <th scope="col">Lecturer name</th>
            <th scope="col">Room no</th>
            <th scope="col">Details </th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
        </tr>
        </thead>
        <tbody>
            @foreach($lecturers as $lecturer)
                <tr>
                    <th scope="row">{{$lecturer->id}}</th>
                    <td>{{$lecturer->matric_number}}</td>
                    <td>{{$lecturer->course}}</td>
                    <td>{{$lecturer->course_code}}</td>
                    <td>{{$lecturer->lecturer_name}}</td>
                    <td>{{$lecturer->room_no}}</td>
                    <td>{!! Str::limit($lecturer->details, 20) !!} </td>
                    <td>{{$lecturer->created_at}}</td>
                    <td>{{$lecturer->updated_at->diffForHumans()}}</td>
                    <td>
                        <form action="{{route('lecturer.destroy', $lecturer->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>No Record Yet</h2>
    @endif
@endsection
