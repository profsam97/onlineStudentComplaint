@extends('layouts.admin')

@section('content')
    <h2 @class('text-center') >All Users</h2>
    @if(Session::has('updated_user') || Session::has('deleted_user') || Session::has('created_user'))
        <div class="text-center">
            <p class="bg-success">{{Session('created_user')}}</p>
            <p class="bg-primary">{{Session('updated_user')}}</p>
            <p class="bg-danger">{{Session('deleted_user')}}</p>
        </div>
    @endif
    @if(count($users) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">Role</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles->name}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>
                        <form action="{{route('user.destroy', $user->id)}}" method="post">
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
