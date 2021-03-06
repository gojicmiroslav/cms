@extends('layouts.app')

@section('title', "Posts")

@section('sidebar')
	@parent
@endsection

@section('content')
	<h1>All Posts</h1>

	@foreach($posts as $post)
		<p><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></p>
	@endforeach

	<hr/>
	<p><a href="{{ route("posts.create") }}">Create New Post</a></p>

@endsection

@section('footer')
	<p>This is footer</p>
@endsection