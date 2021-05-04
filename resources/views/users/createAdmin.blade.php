@extends('layouts.admin')
@section('title', 'Create User')
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

    <form action="/admin/users/add" method="post">
        <div class="card col-10 offset-1">
            <div class="card-header">
                <h1>Create New User</h1>
                <hr>
                <label for="firstname">Firstname:</label>
                <input class="form-control" name="firstname">
                <label for="lastname">Lastname:</label>
                <input class="form-control" name="lastname">
            </div>

            <div class="card-body">
                <label for="email">Email:</label>
                <input class="form-control" name="email">
                <label for="role">Role:</label>
                <select class="form-control" name="role">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>

                <label for="year">Year:</label>
                <select class="form-control" name="year">
                    <option value="0">0</option>
                </select>
                {{csrf_field()}}
                <button class="btn btn-success">Create</button>
            </div>
        </div>

    </form>
@endsection
