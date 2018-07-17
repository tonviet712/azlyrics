@extends('layouts.master')

<?php $result = '' ; 
	foreach($song->artists->all() as $artist) {
		$result .= $artist->name." & " ;
	}
	$result = substr($result, 0,-2) ;
?>
@section('content')
<div class="container" style="width: 50%; background-color: #eaeded ; text-align: center;">
	<strong>{{ $song->title }}</strong> 
	<br> 
	<i>{{$result}}</i>			
	<hr>
	<p style="white-space: pre-wrap;">{{ $song->lyrics }} </p>

	<hr>
	
	<p><a class="btn btn-primary btn-lg btn-block" href="/azlyrics/public/songs/{{$song->slug}}/edit" role="button">Correction Lyrics</a></p>
	@if (Auth::check())
		@if (Auth::user()->role == 'admin')
		<form class="delete" action="/azlyrics/public/admin/delete/{{$song->id}}?type=song" method="POST">
			{{ method_field('DELETE') }}
			@csrf
	        <input type="submit" value="Delete" class="btn btn-danger btn-lg btn-block">
	    </form>
	    @endif
	@endif
</div>

@endsection