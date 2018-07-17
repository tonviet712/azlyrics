@extends('layouts.master')

@section('content')

<div class="container" style="width: 50%; background-color: #eaeded ; font-weight: 800;">
	<form method="POST" action="azlyrics/public/login">
		@csrf
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" name="email">
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" id="password" name="password">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-outline-primary" name="submit">Log In</button>
		</div>
	</form>
</div>

@endsection