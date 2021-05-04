@extends('layouts.admin')
@section('title', 'User Inspect')
@section('content')

    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="/admin/user/{{$user->id}}" method="post">
    <div class="card col-10 offset-1">
        <div class="card-header">
            <h1>Modify User {{$user->id}}</h1>
            <hr>
            <label for="firstname">Firstname:</label>
            <input class="form-control" value="{{$user->firstName}}" name="firstname">
            <label for="lastname">Lastname:</label>
            <input class="form-control" value="{{$user->lastName}}" name="lastname">
        </div>

        <div class="card-body">
            <label for="email">Email:</label>
            <input class="form-control" value="{{$user->email}}" name="email">
            <label for="role">Role:</label>
            <select class="form-control" name="role">
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
            <label for="enabled">Enabled:</label>
            <input type="checkbox" name="enabled" class="form-control" value="true" checked>
            {{csrf_field()}}
            <button class="btn btn-warning">Update</button>
        </div>
    </div>

</form>

@endsection
