@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $work->title }}</h1>
		<p>{{ $work->content }}</p>
		@if(Auth::check() && $work->user_id === Auth::id())
			<a href="{{ route('works.edit', ['slug' => $work->slug]) }}">Modifier</a>
			<a href="{{ route('works.delete', ['slug' => $work->slug]) }}">Supprimer</a>
		@endif
	</div>
@endsection