@extends('layouts.master')

@section('content')

<!-- write html for artist -->
<?php 
	$flag = false ;
	$q =$_GET['q'] ;
?>
@if (count($artists) > 0)
<div class="container" style="width: 50%; background-color: #eaeded ; text-align: center;">
	<p><b>Artist result:</b></p>
	<table class="table table-condensed">
	<?php 
		$i = 1 ;
		$flag = true ;
	 ?>
	@foreach($artists as $artist)
        <tr>
        	<td class="text-left visitedlyr">
            	{{$i}}. <a href="/azlyrics/public/artist/{{$artist->slug}}" target=""><b>{{$artist->name}}</b></a>
            </td>
        </tr>
    <?php $i = $i + 1 ; ?> 
	@endforeach
	</table>
	@if($i > 5)
	<div class="alert alert-info" role="alert">
		<a href="/azlyrics/public/search?q={{ $q }}&w=artists">More Artist Result</a>
	</div>
	@endif
</div>
@endif
<br>


<!-- write html for lyrics -->
@if (count($songs) > 0)
<div class="container" style="width: 50%; background-color: #eaeded ; text-align: center;">
	<p><b>Song result:</b></p>
	<table class="table table-condensed">
	<?php 
		$i = 1 ;
		$flag = true ;
	 ?>
	@foreach($songs as $song)
        <tr>
        	<td class="text-left visitedlyr">
            	{{$i}}. <a href="/azlyrics/public/songs/{{$song->slug}}" target=""><b>{{$song->title}}</b></a>
            	<p>{{ substr($song->lyrics, 0, 100)}}...</p>
            </td>
        </tr>
    <?php $i = $i + 1 ; ?> 
	@endforeach
	</table>
	@if($i > 5)
	<div class="alert alert-info" role="alert">
		<a href="/azlyrics/public/search?q={{ $q }}&w=songs">More Songs Result</a>
	</div>
	@endif
</div>
@endif




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