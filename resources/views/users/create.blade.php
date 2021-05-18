@extends('layouts.blank')
@section('title', 'register')
@section('content')

    <div class="col-8 offset-2" style="margin-top: 15%;">
    <div class="card">
        <div class="card-header">
            <h3>Register an account</h3>
        </div>
        <div class="card-body">
            <a href="/auth/redirect"><button class="btn btn-primary">Sign up with Google</button></a><hr>
            <form action="/register" method="POST">
                {{ csrf_field() }}
                <input class="form-control" name="instance" placeholder="Institution Identifier"><br>
                <div class="input-group">
                    <input class="form-control" type="name" name="firstname" placeholder="First Name">
                    <input class="form-control" type="name" name="lastname" placeholder="Last Name">
                </div><br>
                <input class="form-control" type="email" name="email" placeholder="Email"><br>
                <input class="form-control" type="password" name="password" placeholder="password"><br>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Type your password again"><br>
                <button class="btn btn-success">Join!</button>
            </form>
        </div>
    </div>
    </div>

@endsection
