@extends('layouts.admin')
@section('title', 'User Index')
@section('content')
    @foreach($users as $user)
    <div class="card" style="margin-top: 2rem; margin-right: 2rem">
        <div class="card-header">
            <h4>{{$user->firstName}} {{$user->lastName}}</h4> <small>{{$user->email}}</small>
        </div>
        <div class="card-body">
            <p>Enabled: {{$user->enabledToString()}}</p>
            <p>Role: {{$user->role}}</p>
            <form action="/admin/user/{{$user->id}}">
                <button class="btn btn-warning">Modify</button>
            </form>
        </div>
    </div>
    @endforeach

@endsection
