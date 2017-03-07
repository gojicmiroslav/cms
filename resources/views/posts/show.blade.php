@extends('layouts.app')

@section('title', "Post")

@section('sidebar')
	@parent
@endsection

@section('content')
	<h1>{{ $post->title }}</h1>

@endsection

@section('footer')
	<p>This is footer</p>
@endsection