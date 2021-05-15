@extends('layouts.admin')
@section('title', 'Tags')
@section('content')


        <div class="col-10 offset-1" style="margin-top: 2rem">
        @foreach($tags as $tag)
            <a href="/admin/tag/{{$tag->id}}"><div class="card" style="background-color: {{$tag->color}}; color: white">
                <div class="card-body">
                    <h1>{{$tag->name}}</h1>
                </div>
            </div>
            </a>
            <br>
        @endforeach

            <hr>

    <div class="card">
        <div class="card-header">
            <h1>Add a new tag</h1>
        </div>

        <div class="card-body">
            <form action="/admin/tags/new" method="post">
                <div class="form-group">
                    <label for="name">
                        Name:
                    </label>
                    <input class="form-control" name="name" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="color">
                        Color:
                    </label>
                    <input class="form-control" name="color" type="text" aria-describedby="colorhelp" required/>
                    <small id="colorhelp">Needs to be in hexadecimal #FFFFFF for example</small>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Add!</button>
            </form>
        </div>
    </div>

@endsection
