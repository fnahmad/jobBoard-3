@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Ajouter une offre</h1>
		@if ((isset($errors) && $errors && count($errors) > 0) || Session::has('message'))
			<div class="alert {{ Session::has('alert-class') ? 'alert-'.Session::get('alert-class') : '' }}">
				<ul class="container">
					@if(Session::has('message'))
						<li>{{ Session::get('message') }}</li>
					@endif
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		<form action="{{ route('offers.store') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="title">Titre</label>
				<input type="text" class="form-control" name="title" value="{{ old('title') }}">
			</div>
			<div class="form-group">
				<label for="working_time">Temps de travail estimé</label>
				<input type="text" class="form-control" name="working_time" value="{{ old('working_time') }}">
			</div>
			<div class="form-group">
				<label for="skill_level">Niveau demandé (sur 5)</label>
				<input type="number" min="1" max="5" class="form-control" name="skill_level"
				       value="{{ old('skill_level') }}" placeholder="4">
			</div>
			<div class="form-group">
				<label for="people">Nombre de personne estimé</label>
				<input type="number" min="1" class="form-control" name="people"
				       value="{{ old('people') }}">
			</div>
			<div class="form-group">
				<label for="contact_name">Nom du contact</label>
				<input type="text" class="form-control" name="contact_name"
				       value="{{ old('contact_name') }}">
			</div>
			<div class="form-group">
				<label for="contact_email">Email du contact</label>
				<input type="text" class="form-control" name="contact_email"
				       value="{{ old('contact_email') }}">
			</div>
			<div class="form-group">
				<label for="contact_phone">Téléphone du contact</label>
				<input type="tel" class="form-control" name="contact_phone"
				       value="{{ old('contact_phone') }}">
			</div>
			<div class="form-group">
				<label for="budget">Budget</label>
				<input type="number" class="form-control" name="budget"
				       value="{{ old('budget') }}">
			</div>
			<div class="form-group">
				<label for="start_at">Début souhaité</label>
				<input type="date" class="form-control" name="start_at"
				       value="{{ old('start_at') }}">
			</div>
			<div class="form-group">
				<label for="end_at">Fin souhaitée</label>
				<input type="date" class="form-control" name="end_at"
				       value="{{ old('end_at') }}">
			</div>
			<div class="form-group">
				<label for="content">Détail</label>
				<textarea name="content" id="content" cols="30" rows="10"
				          class="form-control">{{ old('content') }}</textarea>
			</div>
			<button type="submit">Valider</button>
		</form>
	</div>
@endsection
