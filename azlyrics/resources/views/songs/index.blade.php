@extends('layouts.master')

@section('content')



<div class="container" style="margin-top: 10px;">
	@include('flash::message')
	<div class="alert alert-secondary" role="alert">
		<h1 style="font-weight: 700; font-size: 2.5em; color: #000080;">Welcome To AZLyrics</h1>
	</div>
	<hr>
	<div class="alert alert-info " role="alert">
		It's a place where all searches end!
	</div>
	<div class="alert alert-info " role="alert">
		Searches and enjoys the universe of lyrics all genres and ages shine
	</div>
	<a href="/azlyrics/public/songs/create" class="btn btn-primary">Submit Track</a>
</div>


@endsection
