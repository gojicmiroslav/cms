@extends('layouts.app')

@section('title', "Contact Page")

@section('content')
	<h3>Edit Post</h3>

	@if(count($errors) > 0)

		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>

	@endif

	{{-- <form action="/posts/{{ $post->id }}" method='POST'> --}}
	{!! Form::model($post, ['action' => ['PostsController@update', $post], 'method' => 'PUT'])  !!}
		{{ csrf_field() }}
		
		{{-- <input type="hidden" name="_method" value="PUT"> --}}

		{{-- <input type="text" name="title" value="{{ $post->title }}"> --}}
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('content', 'content:') !!}
			{!! Form::text('content', $post->content, ['class' => 'form-control']) !!}
		</div>

		{{-- <input type="submit" name="Submit" value="Edit Post"> --}}
		{!! Form::submit('Edit Post', ['class'=> 'btn btn-primary']) !!}

	{!! Form::close() !!}

@endsection

