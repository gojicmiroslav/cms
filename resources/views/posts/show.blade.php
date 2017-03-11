@extends('layouts.app')

@section('title', "Post")

@section('sidebar')
	@parent
@endsection

@section('content')
	<h1>{{ $post->title }}</h1>
	<p><a href="{{ route("posts.edit", $post->id) }}">Edit</a></p>

	{{-- <form action="/posts/{{ $post->id }}" method="POST"> --}}
	{!! Form::model($post, ['action' => ['PostsController@destroy', $post], 'method' => 'DELETE'])  !!}
		{{ csrf_field() }}

		{{-- <input type="hidden" name="_method" value="DELETE"> --}}

		{{-- <input type="submit" name="Delete" value="Delete"> --}}
		{!! Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}
	
	{!! Form::close() !!}
@endsection

@section('footer')
	<hr/>
	<p>This is footer</p>
@endsection