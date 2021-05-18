@extends('layouts.main')
@section('title', 'Profile')
@section('content')

    <div class="col-10 offset-1" style="margin-top: 2rem">
        <div class="card">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Book</th>
                    <th scope="col">Created</th>
                    <th scope="col">Due</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                    @foreach(auth()->user()->loans as $loan)
                        <tr>
                            <td scope="row">{{ $count }}<?php $count++; ?></td>
                            <td>{{$loan->book->title}}</td>
                            <td>{{ $loan->created_at->toFormattedDateString() }}</td>
                            <td>{{ auth()->user()->getDueDate($loan->book)['ugly']->toFormattedDateString() }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
