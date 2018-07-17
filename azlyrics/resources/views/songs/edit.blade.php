@extends('layouts.master')

<?php $result = '' ; 
	foreach($song->artists->all() as $artist) {
		$result .= $artist->name." & " ;
	}
	$result = substr($result, 0,-2) ;
?>

@section('content')

<div class="container" style="width: 50%; background-color: #eaeded ; font-weight: 800;">
	<form method="POST" action="/azlyrics/public/songs">
		@csrf


		<p for="artist">You want to:</p>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" id="inlineCheckbox1" name="type" value="addition" disabled>
			<label class="form-check-label" for="inlineCheckbox1">Submit lyrics</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" id="inlineCheckbox2" name="type" value="correction" checked >
			<label class="form-check-label" for="inlineCheckbox2">Correct lyrics</label>
		</div>

		<div class="form-group">
			<label for="artist">Artist:</label>
			<input type="text" class="form-control" id="artist" name="artist" value="{{$result}}">
			@if ($errors->has('artist'))
			<div class="alert alert-danger">{{ $errors->first('artist') }}</div>
			@endif
		</div>

		<div class="form-group">
			<label for="song">Song title:</label>
			<input type="text" class="form-control" id="song" name="song" value="{{$song->title}}">
			@if ($errors->has('song'))
			<div class="alert alert-danger">{{ $errors->first('song') }}</div>
			@endif
		</div>

		<div class="form-group">
			<label for="lyrics">Lyrics:</label>
			<pre><textarea class="form-control" name="lyrics" rows="30">{{$song->lyrics}}</textarea></pre>
			@if ($errors->has('lyrics'))
			<div class="alert alert-danger">{{ $errors->first('lyrics') }}</div>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-outline-primary" name="submit">Submit Lyrics</button>
		</div>
	</form>
</div>

@endsection