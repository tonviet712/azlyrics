@extends('layouts.master')

@section('content')

<div class="container" style="width: 50%; background-color: #eaeded ; font-weight: 800;">
	@if (count($demands) > 0)
	<ul class="list-group">
		@foreach($demands as $demand)

			@if ($demand->type == 'addition')
				<li class="list-group-item">
					<a href="/azlyrics/public/admin/create/{{$demand->id}}">
						{{ $demand->song}}</a>-<b>{{$demand->artist}}</b>
				</li>
			@elseif ($demand->type == 'correction')
				<li class="list-group-item">
					<i>Edit: </i><a href="/azlyrics/public/admin/edit/{{$demand->id}}">
						{{ $demand->song}}</a>-<b>{{$demand->artist}}</b>
				</li>
			@endif
		@endforeach
	</ul>
	@else
		<div class="alert alert-primary" role="alert">
		  Have no request
		</div>
	@endif
</div>

@endsection