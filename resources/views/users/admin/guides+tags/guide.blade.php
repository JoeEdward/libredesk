@extends('layouts.admin')
@section('title', 'guides')
@section('content')

    <div class="col-10 offset-1" style="margin-top: 2rem">
        <div class="container">
            <a class="nav-link" href="/admin/guides/{{$guide->id}}/delete"><button class="btn btn-danger">Delete</button></a>
            <h2 class="display-3">{{ $guide->name }}</h2>
            <p class="lead">
                @foreach($guide->tags as $tag)
                    <span style="color: {{$tag->color}}">{{ $tag->name }}</span>
                @endforeach
            </p>
            <div class="card">
                <div class="card-body">
                    <p class="lead">Books:</p>
                    @foreach($guide->books() as $book)
                        <div class="alert alert-secondary">
                            <p class="lead">{{ $book->title }}</p>
                            <p class="lead">{{ $book->author->first_name }}, {{$book->author->Last_name}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
