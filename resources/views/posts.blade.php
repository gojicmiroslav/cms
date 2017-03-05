@extends('layouts.app')

@section('title', "Posts")

@section('content')
	<h2>Posts</h2>
	@if(count($posts))
		<ul>
		@foreach($posts as $post)
			<li>
				<b>{{ $post->title }}</b> |
				{{ $post->content }}
			</li>
		@endforeach
		</ul>
	@endif	
@endsection

@section('footer')
	<p>This is footer</p>
@endsection