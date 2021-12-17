@extends('layouts.user')


@section('content')
    <h2>Create a new User</h2>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="name" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <select name="role_id" id="">
                <option selected value=""> Choose Role</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="photo_id" class="form-control" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <div class="form-group">
            <select name="is_active" id="">
                <option selected value=""> Choose Status</option>
                <option  value="1">active</option>
                <option value="2">not_active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @include('includes.errors')


@endsection
