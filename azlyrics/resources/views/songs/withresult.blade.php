@extends('layouts.master')

@section('content')

<!-- write html for artist -->
@if ($type == 'artists')
<div class="container" style="width: 50%; background-color: #eaeded ; text-align: center;">
	<p><b>Artist result:</b></p>
	<table class="table table-condensed">
	<?php 
		$i = 1 ;
		$flag = true ;
	 ?>
	@foreach($with as $artist)
        <tr>
        	<td class="text-left visitedlyr">
            	{{$i}}. <a href="/azlyrics/public/artist/{{$artist->slug}}" target="">
            			<b>{{$artist->name}}</b>
            	</a>
            </td>
        </tr>
    <?php $i = $i + 1 ; ?> 
	@endforeach
	</table>
	<div class="d-flex justify-content-center">
		{{$with->appends(['q' => $q,'w'=>$type])->links()}}
	</div>
</div>

<br>





<!-- write html for lyrics -->
@elseif ($type == 'songs')
<div class="container" style="width: 50%; background-color: #eaeded ; text-align: center;">
	<p><b>Song result:</b></p>
	<table class="table table-condensed">
	<?php 
		$i = 1 ;
		$flag = true ;
	 ?>
	@foreach($with as $song)
        <tr>
        	<td class="text-left visitedlyr">
            	{{$i}}. <a href="/azlyrics/public/songs/{{$song->slug}}" target=""><b>{{$song->title}}</b></a>
            	<p>{{ substr($song->lyrics, 0, 100)}}...</p>
            </td>
        </tr>
    <?php $i = $i + 1 ; ?> 
	@endforeach
	</table>
	<div class="d-flex justify-content-center">
		{{$with->appends(['q' => $q,'w'=>$type])->links()}}
	</div>
</div>
@endif





<!-- if there is no result -->
@if ($flag == false)
<div class="container" style="margin-top: 10px;">
	<div class="alert alert-success " role="alert">
		<p>
			Sorry, your search returned no results. Try to compose less restrictive search query or check spelling.
		</p>
	</div>
</div>
@endif


@endsection