@extends('layouts.admin')
@section('title', 'Authors')
@section('content')

    @foreach($authors as $author)

        <div class="col-10 offset-1 card" style="margin-top: 2rem">
            <div class="card-header">
                <h1>{{$author->Last_name}}, {{$author->first_name}}</h1>
            </div>
            <div class="card-body">
                <a href="/authors/{{$author->id}}"><button class="btn btn-warning">Modify</button></a>
            </div>
        </div>

    @endforeach

@endsection
