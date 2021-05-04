@extends('layouts.main')
@section('title', 'Welcome')
@section('content')

    <div class="jumbotron">
        <h1 class="display-4">Welcome to LibreDesk</h1>
        <p class="lead">Your one neat system to control and manage your entire library system</p>
        <hr class="my-4">
        <p>Sign in or up now!</p>
        <button class="btn btn-primary">Sign Up</button>
        <button class="btn btn-primary">Log In</button>
    </div>

    <div class="row">

        <div class="container col-md-5 m-auto">
            <h1 class="h4">What is it?</h1>
            <p>Libredesk is a powerfull lightweight Content management system designed to be deployed in your local enviroment</p>
        </div>

        <div class="container col-md-5 m-auto">
            <img class="rounded img-fluid" src="https://via.placeholder.com/1920x1080">
        </div>

    </div>
    <div class="row mt-4">

        <div class="container col-5 m-auto">
            <img class="rounded img-fluid" src="https://via.placeholder.com/1920x1080">
        </div>

        <div class="container col-5 m-auto">
            <h1 class="h4">What does it do?</h1>
            <p>Stuff cool stuff</p>
        </div>

@endsection