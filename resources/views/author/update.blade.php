@extends('layouts.admin')
@section('title', 'Update Author')
@section('content')

    @if ($errors->any())
        <div class="alert alert-primary" style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 style="margin-top: 2rem">Update Author</h1>

    <form action="/authors/{{$author->id}}" method="post">
    <div class="card col-10 offset-1" style="margin-top: 2rem">
        <div class="card-header">
            <label for="firstName">First Name:</label>
            <input class="form-control" name="firstName" value="{{$author->first_name}}">
            <label for="lastName">Last Name:</label>
            <input class="form-control" name="lastName" value="{{$author->Last_name}}">
        </div>

        <div class="card-body">
            <label for="Bio">Bio:</label>
            <textarea name="bio" class="form-control">{{$author->bio}}</textarea>
            <br>
            {{csrf_field()}}
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
    </form>
@endsection
