@extends('layouts.app')

@section('title', "Posts")

@section('sidebar')
	@parent
@endsection

@section('content')
	<h1>All Posts</h1>

	@foreach($posts as $post)
		<p>{{ $post->title }}</p>
	@endforeach

@endsection

@section('footer')
	<p>This is footer</p>
@endsection