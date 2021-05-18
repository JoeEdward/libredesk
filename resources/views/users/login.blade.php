@extends('layouts.main')
@section('title', 'Login')
@section('content')

<div class="col-8 offset-2" style="padding: 2rem">
	<div class="card">
		<div class="card-header">
			<h2>Login:</h2>
		</div>
		<div class="card-body">

			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<a href="/auth/redirect"><button class="btn btn-primary">Sign in with Google</button></a><hr>
			<form action="/login" method="POST">
				<div class="form-group">
					<label for="email" class="form-label">Email</label>
					<input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" !required>
					<div id="emailHelp" class="form-text">Enter Your Institution Email Address</div>
				</div>

				<div class="form-group">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" !required>
				</div>

				<div class="form-group">
					<label for="remember" class="form-check-label">Remember me?</label>
					<input type="checkbox" name="remember" class="form-control">
				</div>

				{{csrf_field()}}

				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>


	@endsection
