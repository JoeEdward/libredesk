@extends('layouts.admin')
@section('title', 'Desk')
@section('content')

    <div class="col-10 offset-1" style="margin-top: 2rem">

        @if(empty($errors) != [])
            <div class="alert alert-warning">
                <h3>{{ $errors }}</h3>
            </div>
        @endif

        <h2>Return a users book</h2>
        <form action="/admin/desk" method="POST">
            <input class="form-control" name="id" placeholder="Book ID">
            {{csrf_field()}}<br>
            <button class="btn btn-success">Return</button>
        </form>
    </div>

@endsection
