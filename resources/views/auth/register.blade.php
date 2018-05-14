@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Register') }}</div>
					@if ((isset($errors) && $errors && count($errors) > 0) || Session::has('message'))
						<div class="alert {{ Session::has('alert-class') ? 'alert-'.Session::get('alert-class') : '' }}">
							<ul class="errors">
								@if(Session::has('message'))
									<li class="errors-item">{{ Session::get('message') }}</li>
								@endif
								@foreach ($errors->all() as $error)
									<li class="errors-item danger">{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf
							
							<div class="form-group row">
								<label for="firstname" class="col-md-4 col-form-label text-md-right">Prénom</label>
								
								<div class="col-md-6">
									<input id="firstname" type="text"
									       class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
									       name="firstname" value="{{ old('firstname') }}" required autofocus>
									
									@if ($errors->has('firstname'))
										<span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="lastname" class="col-md-4 col-form-label text-md-right">Nom</label>
								
								<div class="col-md-6">
									<input id="lastname" type="text"
									       class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
									       name="lastname" value="{{ old('lastname') }}" required autofocus>
									
									@if ($errors->has('lastname'))
										<span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">Email HETIC</label>
								
								<div class="col-md-6">
									<input id="email" type="email"
									       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
									       name="email" value="{{ old('email') }}" required>
									
									@if ($errors->has('email'))
										<span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="promo" class="col-md-4 col-form-label text-md-right">Promo HETIC</label>
								
								<div class="col-md-6">
									<input id="promo" type="number"
									       class="form-control{{ $errors->has('promo') ? ' is-invalid' : '' }}"
									       placeholder="2020" name="promo" value="{{ old('promo') }}" required>
									
									@if ($errors->has('promo'))
										<span class="invalid-feedback">
                                        <strong>{{ $errors->first('promo') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="phone" class="col-md-4 col-form-label text-md-right">Téléphone</label>
								
								<div class="col-md-6">
									<input id="phone" type="tel"
									       class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
									       name="phone" value="{{ old('phone') }}">
									
									@if ($errors->has('phone'))
										<span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							
							<div class="form-group row">
								<label for="password"
								       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
								
								<div class="col-md-6">
									<input id="password" type="password"
									       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
									       name="password" required>
									
									@if ($errors->has('password'))
										<span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							
							<div class="form-group row">
								<label for="password-confirm"
								       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
								
								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control"
									       name="password_confirmation" required>
								</div>
							</div>
							
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Register') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
