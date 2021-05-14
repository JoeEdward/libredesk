@extends('layouts.main')
@section('title', 'Tag')
@section('content')

    <div class="col-10 offset-1">

    <h2 class="display-4" style="color: {{$tag->color}}">{{$tag->name}}</h2>

    @foreach($tag->books as $book)

        <a href="/user/book/{{$book->id}}"> <div class="col-12" style="color: #000000">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <img class="col-2" src="{{$book->img}}">
                            <div class="col-7">
                                <h1>{{$book->title}}</h1>
                                <h2>{{ $book->author->first_name }}, {{ $book->author->Last_name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Blurb:</h4><hr>
                        <h4>{{ $book->blurb }}</h4>
                    </div>
                </div>
            </div>
        </a>
    @endforeach

    </div>

@endsection
