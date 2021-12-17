@extends('layouts.user')

@section('content')
    <h2>Create a new Student Complaint </h2>
    @include('includes.error')
    @include('includes.tiny')

    <form action="{{route('UserStudent.store')}}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="">Matric Number</label>
            <input type="text" class="form-control" name="matric_number" id="exampleInputPassword1">
        </div>

        <div class="form-group">
            <label for="">Course Title </label>
            <input type="text" name="course_title" class="form-control"  id="">
        </div>

        <div class="form-group">
            <label for="">Course Code </label>
            <input type="text" name="course_code" class="form-control"  id="">
        </div>

        <div class="form-group">
            <label for="">Lecturer Name </label>
            <input type="text" name="lecturer_name" class="form-control"  id="">
        </div>
        <div class="form-group">
            <label for="">Exam Session Month </label>
            <input type="number" name="exam_session_month" class="form-control"  id="">
        </div>
        <div class="form-group">
            <label for="">Exam Session Year </label>
            <input type="number" name="exam_session_year" class="form-control"  id="">
        </div>
        <div class="form-group">
            <label for="">Missing Mark </label>
            <input type="number" name="missing_mark" class="form-control"  id="">
        </div>
        <div class="form-group">
            <label for="">Details </label>
            <textarea name="details" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
