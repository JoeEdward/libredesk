@extends('layouts.admin')
@section('title', 'Tag Edit')
@section('content')

<div class="col-10 offset-1" style="margin-top: 1rem;">
    <form action="/admin/tags/update/{{$tag->id}}" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" name="name" type="text" value="{{$tag->name}}">
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input class="form-control" name="color" type="text" value="{{$tag->color}}" aria-describedby="color">
            <small style="color: {{$tag->color}}">Current color</small>
        </div>

        {{csrf_field()}}

        <button class="btn btn-warning">Update</button>
    </form>
    <a href="/admin/tags/delete/{{$tag->id}}"><button class="btn btn-danger">Delete</button></a>
</div>

@endsection
