@extends('layouts.admin')
@section('title', 'MOTD')
@section('content')

    <div class="col-10 offset-1" style="margin-top: 2rem">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @isset($motd)
            <div class="rounded bg-light col-12 ml-1 mt-3" style="height: 29rem;">
                <div class="row">
                    <div class="col-6">
                        <img style="padding: 1.1rem; width: 100%; height: auto" src="{{url($motd->img)}}">
                    </div>
                    <div class="col-6" style="padding: 1.1rem">
                        <h2 style="text-align: center">{{$motd->title}}</h2>
                        <br>
                        <p style="text-align: center;overflow: scroll; height:20rem">{{$motd->description}}</p>
                    </div>
                </div>
            </div>
            <br>

        @else
            <div class="alert alert-primary">
                <h3>Currently No MOTD Set</h3>
            </div>
        @endisset

        <div class="card">
            <div class="card-header">
                <h4>Add new MOTD</h4>
            </div>
            <div class="card-body">
                <form action="/admin/motd" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <label for="name" class="form-label">Name</label>
                    <input name="title" type="text" class="form-control">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                    <label for="img" class="form-label">Image Upload</label>
                    <input type="file" class="form-control" name="img"><br>
                    <button type="submit" class="btn btn-success">Add!</button>
                </form>
            </div>
        </div>


    </div>



@endsection
