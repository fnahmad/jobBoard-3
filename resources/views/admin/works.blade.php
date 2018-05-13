@extends('layouts.admin')

@section('content')
  <back-office-works
    :algolia="{
      'index-name': '{{ env('SCOUT_PREFIX') }}works',
      'app-id': '{{ env('ALGOLIA_APP_ID') }}',
      'api-key': '{{ env('ALGOLIA_SECRET') }}'
    }"
  />
@endsection
