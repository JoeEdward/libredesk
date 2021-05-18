@extends('layouts.main')
@section('title', 'Profile')
@section('content')

    <div class="jumbotron">
        <h1 class="display-1">Welcome, {{ auth()->user()->firstName }}</h1><hr>
        <h3 class="display-5"> From Here you Can manage your account</h3>
    </div>

    <!-- Loans Control -->
    <div class="row">
        <div class="col-4 text-center">
            <h1>Loans:</h1>
            <button class="btn btn-primary" style="width: 90%" id="loansBtn">Show/Hide</button>
            <div class="col-10 offset-1" id="loans" style="margin-top: 2rem">
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
        </div>
        <div class="col-4 text-center">
            <h1>Account Details:</h1>
            <button class="btn btn-primary" style="width: 90%" id="profileBtn">Show/Hide</button>
            <div class="col-10 offset-1" id="profile" style="margin-top: 2rem">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ auth()->user()->firstName }} {{ auth()->user()->lastName }}</h1>
                    </div>
                    <div class="card-body">
                        <p class="lead">Email: {{ auth()->user()->email }}</p>
                        <p class="lead">Role: {{ auth()->user()->role->name }}</p>
                        <p class="lead">Active Loans: {{ count(auth()->user()->loans) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 text-center">
            <h1 style="color: red">Danger Zone</h1>
            <button class="btn btn-danger" style="width: 90%">Delete</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
           $('#profile').toggle();
           $('#loans').toggle();
        });

        $('#profileBtn').click(function() {
            $('#profile').toggle(400);
        });

        $('#loansBtn').click(function () {
           $('#loans').toggle(400);
        });
    </script>

@endsection
