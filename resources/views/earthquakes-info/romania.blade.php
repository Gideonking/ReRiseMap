@extends('layout')

@section('content')

  
  <section class="home-section container">
 
  	<div>
	<h1>Cele mai recente cutremure in Romania: </h1>
	@foreach($earthquakes as $earthquake) 
		<p>Data, ora: {{ $earthquake["time"]}}</p>
		<p>Long: {{ $earthquake["lon"]}}</p>
		<p>Lat: {{ $earthquake["lat"]}}</p>
		<p>Adancime: {{ $earthquake["depth"]}}km</p>
		<p>Magnitudine: {{ $earthquake["mag"]}}</p>
		<!-- <p>Tara: {{ $earthquake["flynn_region"]}}</p> -->
		<hr>
	@endforeach
</div>
</section>
@endsection