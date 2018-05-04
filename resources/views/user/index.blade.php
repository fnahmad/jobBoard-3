@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
					<div class="card-header">Profil{{ $user->id_admin ? ' - Admin':'' }}</div>
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
					
					<form action="{{ route('user.update') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="fistname">Prénom</label>
							<input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
						</div>
						<div class="form-group">
							<label for="lastname">Nom</label>
							<input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
						</div>
						<div class="form-group">
							<label for="promo">Promo</label>
							<input type="text" class="form-control" name="promo" value="{{ $user->promo }}">
						</div>
						<div class="form-group">
							<label for="phone">Téléphone</label>
							<input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
						</div>
						<button type="submit">Valider</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
