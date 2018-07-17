@extends('layouts.master')

@section('content')

<div class="container" style="width: 50%; background-color: #eaeded ; font-weight: 800;">
	<form method="POST" action="/azlyrics/public/artist/update/{{$artist->id}}">
		{{ method_field('PATCH') }}
		@csrf
		<div class="form-group">
			<label for="artist">Artist:</label>
			<input type="text" class="form-control" id="artist" name="artist" value="{{$artist->name}}">
			@if ($errors->has('artist'))
			<div class="alert alert-danger">{{ $errors->first('artist') }}</div>
			@endif
		</div>

		<div class="form-group">
			<p><button type="submit" class="btn btn-primary btn-lg btn-block">Update</button></p>
	</form>
			<form class="delete" method="post" 
				action="/azlyrics/public/artist/delete/{{$artist->id}}?type=artist">
				{{ method_field('DELETE') }}
				@csrf
				<p><button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button></p>
			</form>

		</div>
</div>

@endsection