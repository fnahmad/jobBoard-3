@extends('layouts.admin')

@section('content')
  <back-office-users 
    :payload="{{ $users }}"
    :algolia="{
      'index-name': '{{ env('SCOUT_PREFIX') }}users',
      'app-id': '{{ env('ALGOLIA_APP_ID') }}',
      'api-key': '{{ env('ALGOLIA_SECRET') }}'
    }"
  />
@endsection