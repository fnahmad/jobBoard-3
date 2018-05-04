@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Nos offres</h1>
		<a href="{{ route('offers.create') }}">Créer</a>
	</div>
@endsection
