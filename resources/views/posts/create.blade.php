@extends('layouts.app')

@section('title', "Contact Page")

@section('content')
	<h3>Create Post</h3>

	{{-- <form action="/posts" method='POST'> --}}

	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST'])  !!}
		{{ csrf_field() }}

		{{-- <input type="text" name="title" placeholder="Enter title...">		 --}}
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('content', 'Description:') !!}
			{!! Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'Enter content...']) !!}
		</div>

		{{-- <input type="submit" name="Submit" value="Create Post"> --}}
		{!! Form::submit('Create Post', ['class'=> 'btn btn-primary']) !!}
	{!! Form::close() !!}

@endsection

