@extends('layouts.master')

@section('content')

<div class="container" style="width: 50%; background-color: #eaeded ; font-weight: 800;">
	<form method="POST" action="/azlyrics/public/admin/update/{{$demand->id}}">
		{{ method_field('PATCH') }}
		@csrf

		<input type="hidden" name="id" value="{{$demand->id}}">

		<div class="form-group">
			<label for="artist">Artist:</label>
			<input type="hidden" class="form-control" id="artist" name="oldartist" value="{{$demand->artist}}">
			<input type="text" class="form-control" id="artist" name="newartist" value="{{$demand->artist}}">

			@if ($errors->has('artist'))
			<div class="alert alert-danger">{{ $errors->first('artist') }}</div>
			@endif
		</div>



		<div class="form-group">
			<label for="title">Song title:</label>
			<input type="hidden" class="form-control" id="title" name="oldtitle" value="{{$demand->song}}">
			<input type="text" class="form-control" id="title" name="newtitle" value="{{$demand->song}}">

			@if ($errors->has('newtitle'))
			<div class="alert alert-danger" role="alert">{{ $errors->first('title') }}</div>
			@endif
		</div>



		<div class="form-group">
			<label for="lyrics">Lyrics:</label>
			<textarea class="form-control" name="lyrics" rows="30" >{{$demand->lyrics}}</textarea>
			
			@if ($errors->has('lyrics'))
			<div class="alert alert-danger" role="alert">{{ $errors->first('lyrics') }}</div>
			@endif
		</div>

		

		<div class="form-group">
			<p><button type="submit" class="btn btn-primary btn-lg btn-block">Update</button></p>
	</form>
			<form class="delete" method="post" action="/azlyrics/public/admin/delete/{{$demand->id}}">
				{{ method_field('DELETE') }}
				@csrf
				<p><button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button></p>
			</form>

		</div>
</div>

@endsection