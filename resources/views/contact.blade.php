@extends('layouts.app')

@section('title', "Contact Page")

@section('sidebar')
	@parent

	<p>This is added to the master sidebar</p>
@endsection

@section('content')
	<h1>Contact Page</h1>

	@if(count($people))
		@foreach($people as $person)
			<h4>{{ $person }}</h4>
		@endforeach
	@endif	
@endsection

@section('footer')
	<p>This is footer</p>
@endsection