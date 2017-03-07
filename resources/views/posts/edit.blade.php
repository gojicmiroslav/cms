@extends('layouts.app')

@section('title', "Contact Page")

@section('content')
	<h3>Edit Post</h3>

	<form action="/posts" method='PUT'>
		{{ csrf_field() }}
		<input type="text" name="title" value="{{ $post->title }}">		

		<input type="submit" name="Submit" value="Create Post">
	</form>

@endsection

