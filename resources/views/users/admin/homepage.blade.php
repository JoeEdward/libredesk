@extends("layouts.admin")
@section("title", "Admin Home")
@section('content')

    <div class="container col-10 offset-1" style="margin-top: 30%; text-align: center">
        <h1>Welcome to the admin page {{\Illuminate\Support\Facades\Auth::user()->firstName}}</h1>

        <p class="lead">Here you can update anything on the website from users to content</p>
    </div>

@endsection
