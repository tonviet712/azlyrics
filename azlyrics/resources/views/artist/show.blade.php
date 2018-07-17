@extends('layouts.master')

@section('content')
<div class="container" style="width: 50%; background-color: #eaeded ; text-align: center;">
	<p  style="margin-bottom: 0px;"><b>{{$artist->name}} result:</b></p>
	@if (Auth::check())
	@if (Auth::user()->role == 'admin')
	<span><i><a href="/azlyrics/public/artist/edit/{{$artist->id}}">Edit</a></i></span>
	@endif
	@endif
	<table class="table table-condensed">
	<?php $i = 1 ; ?> 
	@foreach($artist->songs as $song)
        <tr>
        	<td class="text-left visitedlyr">
            	{{$i}}. <a href="/azlyrics/public/songs/{{$song->slug}}" target="_blank"><b>{{$song->title}}</b></a>
            </td>
        </tr>
    <?php $i = $i + 1 ; ?> 
	@endforeach
	</table>
</div>

@endsection