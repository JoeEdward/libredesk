@extends('layouts.admin')
@section('title', 'All Stocks')
@section('content')

    <h1>Available</h1>
    <table class="table" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Book title</th>
            <th scope="col">Controls</th>
        </tr>
        </thead>
        <tbody>
        @foreach($available as $stock)
            <tr>
                <th scope="col">{{ $stock->id }}</th>
                <td>{{$stock->book->title}}</td>
                <td>
                    <a href="/stock/delete/{{$stock->id}}">
                        <button class="btn btn-danger" onclick="confirm('Are you sure you want to delete this item?')">Delete</button>
                    </a>
                    <a href="/stock/add/{{$stock->book->id}}">
                        <button class="btn btn-warning">Manage All</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h1>On Loan</h1>

    <table class="table" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Book title</th>
            <th scope="col">User</th>
            <th scope="col">Controls</th>
        </tr>
        </thead>
        <tbody>
        @foreach($out as $stock)
            <tr>
                <th scope="col">{{ $stock->id }}</th>
                <td>{{$stock->book->title}}</td>
                <td><a href="/admin/user/{{$stock->loan->user->id}}">
                        {{$stock->loan->user->firstName}} {{$stock->loan->user->lastName}}
                    </a></td>
                <td>
                    <a href="/stock/delete/{{$stock->id}}"><button class="btn btn-danger">Delete</button></a>
                    <a href="/stock/add/{{$stock->book->id}}"><button class="btn btn-warning">Manage All</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
