@extends('layouts.main')
@section('title', 'Overdue')
@section('content')

    <div class="col-10 offset-1" style="margin-top: 2rem;">
    @isset($overdue)
        <table class="table table-danger text-center">
            <thead>
            <th scope="col">No</th>
            <th scope="col">Book</th>
            <th scope="col">Due</th>
            <th scope="col">Taken</th>
            </thead>

            <tbody>
            @foreach($overdue as $loan)
                <tr class="table-danger">
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->dueDate()->toFormattedDateString() }}</td>
                    <td>{{ $loan->created_at->toFormattedDateString() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <br>
        <h2 class="text-center" style="color: red">Please Return these ASAP</h2>

    @else
        <div class="alert alert-success">
            <h3>No overdue loans! Congratulations!</h3>
        </div>
    @endisset
    </div>
@endsection
