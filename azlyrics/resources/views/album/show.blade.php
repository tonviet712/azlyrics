@extends('layouts.master')

@section('content')
<div class="container" style="width: 50%; background-color: #eaeded ; text-align: center;">
	<p>Album: <b>"{{$album->title}}"</b></p>
	@foreach($album->songs as $song)
	<a href="/azlyrics/public/songs/{{$song->slug}}" target="_blank"><p>{{$song->title}}</p></a>
	@endforeach

</div>

@endsection