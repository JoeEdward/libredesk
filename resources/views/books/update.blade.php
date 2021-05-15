@extends('layouts.admin')
@section('title', 'Edit book')
@section('content')

    @if ($errors->any())
        <div class="alert alert-success">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/books/update/{{$book->id}}" method="post">

        <div class="card col-10 offset-1" style="margin-top: 2rem; margin-bottom: 2rem">
            <div class="card-header">
                <label for="title">Title:</label>
                <input type="text" value="{{$book->title}}" class="form-control" name="title">
            </div>
            <div class="card-body">
                <label for="blurb">Blurb / first line:</label>
                <textarea class="form-control" name="blurb">{{$book->blurb}}</textarea>
                <label for="img">Image URL:</label>
                <input type="text" value="{{$book->img}}" class="form-control" name="img">
                <p>Img Preview:</p>
                <img src="{{$book->img}}" style="height: 40%; width: auto"> <br>
                <label>ISBN:</label>
                <input disabled class="form-control" value="{{$book->ISBN}}">
                <br>
                <label>Tags:</label><br>
                <small>Click to delete</small>
                <p>
                @foreach($book->tags as $tag)
                        <a href="/books/tag/remove/{{$book->id}}/{{$tag->id}}"><span style="color: {{$tag->color}}">{{$tag->name}}</span></a>
                @endforeach
                </p>
                <select class="form-control select" multiple name="tags[]">
                    @foreach($tags as $tag)

                        <option value="{{$tag->id}}">{{$tag->name}}</option>

                    @endforeach
                </select>
                {{csrf_field()}}

                <button class="btn btn-warning">Update</button>
            </div>

        </div>

    </form>

@endsection
