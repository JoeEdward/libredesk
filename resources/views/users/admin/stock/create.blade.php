@extends('layouts.admin')
@section('title', 'Add new Stock')
@section('content')

    <table class="table" style="text-align: center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book title</th>
                <th scope="col">Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <th scope="col">{{ ($stock->id - $stocks[0]->id) + 1 }}</th>
                    <td>{{$stock->book->title}}</td>
                    <td>{{$stock->loan->user->firstName ?? 'Available'}} {{$stock->loan->user->lastName ?? ''}}</td>
                    <td><a href="/stock/delete/{{$stock->id}}">
                        <button class="btn btn-danger" onclick="confirm('Are you sure you want to delete this item?')">Delete</button>
                        </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="/stock/add/{{$book->id}}" method="post">
        <select name="count">
            @for($i=1; $i < 11; $i++)
                <option>{{$i}}</option>
            @endfor
        </select>

        {{csrf_field()}}

        <button class="btn btn-success">Add new</button>
    </form>


@endsection
