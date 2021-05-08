@extends('layouts.admin')
@section('title', "Book Test view")
@section('content')

    <h1 style="margin-top: 2rem">All Books</h1>

@foreach($books as $book)

	<div class="card col-10 offset-1" style="margin-top: 2rem">
        <div class="card-header">
            <img src="{{$book->img}}" style="height: 10%; width: auto">
            <h1>{{$book->title}}</h1>
        </div>

        <div class="card-body">
            <p class="lead">Added at {{$book->created_at}}</p>
            <a href="/books/update/{{$book->id}}"><button class="btn btn-warning">Modify</button></a>
            <a href="/stock/add/{{$book->id}}"><button class="btn btn-success">Add New Copy</button></a>
        </div>
    </div>

@endforeach

@endsection
