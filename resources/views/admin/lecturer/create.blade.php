@extends('layouts.admin')

@section('content')
    @include('includes.tiny')
    @include('includes.error')
    <h2>Create a new User</h2>
    <form action="{{route('lecturer.store')}}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="">Matric Number</label>
            <input type="text" class="form-control" name="matric_number" id="exampleInputPassword1">
        </div>

        <div class="form-group">
            <label for="">Course  </label>
            <input type="text" name="course" class="form-control"  id="">
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
            <label for="">Room Number </label>
            <input type="number" name="room_no" class="form-control"  id="">
        </div>
        <div class="form-group">
            <label for="">Details </label>
            <textarea name="details" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @include('includes.error')
@endsection
