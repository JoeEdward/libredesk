@extends('layouts.main')
@section('title', "Book Test view")
@section('content')

@foreach($books as $book)

	{{$book->title}}<br>

@endforeach

@endsection