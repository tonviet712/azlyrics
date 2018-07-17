@extends('layouts.master')

@section('content')

<div class="container" style="width: 50%; background-color: #eaeded ; font-weight: 800;">
	<form method="POST" action="/azlyrics/public/admin/request/{{$demand->id}}">
		
		@csrf

		<input type="hidden" name="id" value="{{$demand->id}}">

		<div class="form-group">
			<label for="artist">Artist:<pre><i>Ex:Eminem & Ed Sheeran</i></pre></label>
			<input type="text" class="form-control" id="artist" name="artist" value="{{$demand->artist}}">

			@if ($errors->has('artist'))
			<div class="alert alert-danger">{{ $errors->first('artist') }}</div>
			@endif
		</div>



		<div class="form-group">
			<label for="title">Song title:</label>
			<input type="text" class="form-control" id="title" name="title" value="{{$demand->song}}">

			@if ($errors->has('title'))
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
			<p><button type="submit" class="btn btn-primary btn-lg btn-block">Add</button></p>
	</form>
			<form class="delete" method="post" action="/azlyrics/public/admin/delete/{{$demand->id}}">
				{{ method_field('DELETE') }}
				@csrf
				<p><button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button></p>
			</form>

		</div>
</div>

@endsection