@extends('layouts.main')
@section('title', 'Book View')
@section('content')

    <div class="container col-10 offset-1">
    <div class="card">
        <div class="card-header">
            <h1>{{$book->title}}</h1>
            <p class="lead">{{$book->author->Last_name}}, {{$book->author->first_name}}</p>
            <p class="lead">
                @foreach($book->tags as $tag)
                    <a href="/tags/{{$tag->id}}"><span style="color: {{$tag->color}}">{{$tag->name}},</span></a>
                @endforeach
            </p>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-4 offset-1">
                <img src="{{$book->img}}" style="width: 100%; height: auto;">
            </div>
            <div class="col-6 offset-1">
                <h3 class="display-4">Description</h3>
                <hr>
                <p class="body">{{$book->blurb}}</p>
                <h3 class="display-4">Controls</h3>
                <hr>
                @if (auth()->user()->userHasCurrentBook($book))
                    <p class="lead">Your copy is due back on <b>{{auth()->user()->getDueDate($book)['pretty']}}</b></p>
                    <p class="lead">Please bring it in to return it</p>
                    <hr>
                    <p class="lead">Need more time?</p>
                    <a href="/user/reloan/{{$book->id}}"><button class="btn btn-warning">Re-Loan</button></a>
                @else
                    <a href="/user/loan/{{$book->id}}"><button {{$book->isAvailable() ? "": "disabled"}} class="btn btn-warning">Loan</button></a>
                    <a href="/user/reserve/{{$book->id}}"><button class="btn btn-success">Reserve</button></a>
                    <hr>
                    <p>{{$book->isAvailable() ? "Available For Loan" : "All out"}}</p>

                @endif

            </div>
            </div>
        </div>
    </div>
    </div>

@endsection
