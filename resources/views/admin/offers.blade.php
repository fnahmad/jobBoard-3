@extends('layouts.admin')

@section('content')
  <back-office-offers
    :payload="{{ $jobs }}"
    :algolia="{
      'index-name': '{{ env('SCOUT_PREFIX') }}works',
      'app-id': '{{ env('ALGOLIA_APP_ID') }}',
      'api-key': '{{ env('ALGOLIA_SECRET') }}'
    }"
  />
@endsection
