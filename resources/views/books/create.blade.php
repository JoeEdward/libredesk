@extends('layouts.admin')
@section('title', 'Add New Book')
@section('content')
    @if ($errors->any())
        <div class="alert alert-primary" style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="card" style="margin-right: 1rem; margin-top: 2rem">
    <div class="card-header">
        <h4>Add New Book (Automatic):</h4>
    </div>
    <div class="card-body">
        <form action="/books/add/isbn" method="POST">
            <div class="form-group">
                <input type="text"
                       class="form-control" name="ISBN" id="ISBN" aria-describedby="helpId" placeholder="ISBN">
                <small id="helpId" class="form-text text-muted">The ISBN is the barcode number on the book</small>
            </div>
            <button action="submit" class="btn btn-success">Create</button>
            {{csrf_field()}}
        </form>
    </div>
</div>

    <div class="card" style="margin-top: 2rem; margin-right: 1rem">
    <div class="card-header">
        <h4>Add New Book (Manual):</h4>
    </div>
    <div class="card-body">
    <form action="/books/add" method="POST">
        <div class="form-group">
            <input type="text"
                   class="form-control" name="title" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <input type="text"
                   class="form-control" name="author" id="author" aria-describedby="helpId" placeholder="Author">
                <small id="helpId" class="form-text text-muted">Please use format Surname, Firstname seperated by a colon</small>
        </div>

        <div class="form-group">
            <textarea class="form-control" name="blurb" id="blurb" rows="3" placeholder="Blurb"></textarea>
        </div>

        <div class="form-group">
            <input type="text"
                   class="form-control" name="img" id="img" aria-describedby="helpId" placeholder="Image URL">
            <small id="helpId" class="form-text text-muted">Add the cover image URL here</small>
        </div>

        <button action="submit" class="btn btn-success">Create</button>

        {{csrf_field()}}
    </form>
    </div>
</div>
@endsection
