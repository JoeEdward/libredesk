@extends('layouts.main')
@section('title', "Search")
@section('content')

    @if($books->isNotEmpty())
        @foreach($books as $book)
           <a href="/user/book/{{$book->id}}"> <div class="col-8 offset-2" style="color: #000000">
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
        <hr>
        <h4 class="col-8 offset-2">End Of Results</h4>
        <a href="{{ route('home') }}"><h4 class="col-8 offset-2">Back</h4></a>
    @else
        <h1>No Books Found</h1>
    @endif

@endsection
