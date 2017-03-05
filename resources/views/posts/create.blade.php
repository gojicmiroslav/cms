@extends('layouts.app')

@section('title', "Contact Page")

@section('content')
	<h3>Create Post</h3>

	<form action="/posts" method='POST'>
		{{ csrf_field() }}
		<input type="text" name="title" placeholder="Enter title...">		

		<input type="submit" name="Submit" value="Create Post">
	</form>

@endsection

@yield('footer')
