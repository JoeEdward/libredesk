@extends('layouts.admin')
@section('title', 'guides')
@section('content')

    <div class="col-10 offset-1" style="margin-top: 2rem">
        @empty($guides[0])

            <div class="alert alert-primary">
                <h4>No Guides found</h4>
            </div>

        @else
        @foreach($guides as $guide)

                <a class="nav-link" href="/admin/guides/{{ $guide->id }}">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$guide->name}}</h4>
                        </div>
                        <div class="card-body">
                            <p class="lead">Books: {{count($guide->books())}}</p>
                            <p class="lead">Tags: {{count($guide->tags)}}</p>
                        </div>
                    </div>
                </a>

        @endforeach
        @endempty

        <div class="card">
            <div class="card-header">
                <h4>Create new Guide</h4>
            </div>
            <div class="card-body">
                <form action="/admin/guides" method="post">
                    {{csrf_field()}}
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <label for="tags" class="form-label">Tags</label>
                    <select class="form-control" multiple name="tags[]" id="tags" aria-describedby="TagHelp">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                    <small id="TagHelp">Hold CTRL and click to select multiple</small>
                    <br>
                    <button class="btn btn-success">Add!</button>
                </form>
            </div>
        </div>
    </div>

@endsection
