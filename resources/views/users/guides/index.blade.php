@extends('layouts.main')
@section('title', 'Guides')
@section('content')

    <div class="col-10 offset-1">
        @foreach($guides as $guide)
            <div class="card">
                <div class="card-header">
                    <h2>{{$guide->name}}</h2>
                    <p class="lead">
                        @foreach($guide->tags as $tag)
                            <span style="color: {{$tag->color}}">{{$tag->name}}, </span>
                        @endforeach
                    </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($guide->books() as $book)

                                <div class="col-3">
                                <div class="row">
                                    <a href="/user/book/{{$book->id}}"><div class="container" style="text-align: center; align-content: center">
                                    <img src="{{ $book->img }}" style="width: 70%; height: auto; margin: auto;">
                                    <p class="lead" style="width: 70%; text-align: center; margin:auto; padding-top: 1rem">{{$book->title}}</p>
                                        </div></a>
                                </div>
                                </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    </div>

@endsection
