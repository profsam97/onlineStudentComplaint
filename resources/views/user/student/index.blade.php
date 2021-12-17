@extends('layouts.user')

@section('content')
    <h2 @class('text-center') >Students Complaint</h2>
    @if(Session::has('updated_user') || Session::has('deleted_user') || Session::has('created_user'))
        <div class="text-center">
            <p class="bg-success">{{Session('created_user')}}</p>
            <p class="bg-primary">{{Session('updated_user')}}</p>
            <p class="bg-danger">{{Session('deleted_user')}}</p>
        </div>
    @endif
    @if(count($students) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Matric_no</th>
                <th scope="col">Course_title</th>
                <th scope="col">Course_course</th>
                <th scope="col">Lecturer name</th>
                <th scope="col">Exam_session Month / Year</th>
                <th scope="col">Details </th>
                <th scope="col">Updated_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row">{{$student->id}}</th>
                    <td>{{$student->matric_number}}</td>
                    <td>{{$student->course_title}}</td>
                    <td>{{$student->course_code}}</td>
                    <td>{{$student->lecturer_name}}</td>
                    <td>{{$student->exam_session_month}} / {{$student->exam_session_year}}</td>
                    <td> {!! Str::limit($student->details, 20) !!} </td>
                    <td>{{$student->updated_at->diffForHumans()}}</td>
                    <td>
                        <form action="{{route('student.destroy', $student->id)}}" method="post">
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
