@extends('layouts.app')

@section('content')
	<app index="{{ env('SCOUT_PREFIX') }}" secret="{{ env('ALGOLIA_SECRET') }}" id="{{ env('ALGOLIA_APP_ID') }}" logout="{{ route('logout') }}"/>
@endsection
