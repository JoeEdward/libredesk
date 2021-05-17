@extends('layouts.main')
@section('title', 'Loans')
@section('content')

    <div class="col-10 offset-1">
        @foreach($tags as $tag)

            <a href="/tags/{{$tag->id}}">
            <div class="card">
                <div class="card-header">
                    <h2 style="color: {{$tag->color}}">{{$tag->name}}</h2>
                    <p class="lead">Click to see more!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php $count = 0; ?>
                        @foreach($tag->books as $book)
                            @if($count < 4)
                            <div class="col-3">
                                <div class="row">
                                    <a href="/user/book/{{$book->id}}"><div class="container" style="text-align: center; align-content: center">
                                            <img src="{{ $book->img }}" style="width: 70%; height: auto; margin: auto;">
                                            <p class="lead" style="width: 70%; text-align: center; margin:auto; padding-top: 1rem">{{$book->title}}</p>
                                        </div></a>
                                </div>
                            </div>
                            <?php $count = $count+1 ?>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
            </a>
            <br>
        @endforeach
    </div>

@endsection
