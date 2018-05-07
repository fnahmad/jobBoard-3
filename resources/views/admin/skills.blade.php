@extends('layouts.admin')

@section('content')
  <back-office-skills
    :algolia="{
      'index-name': '{{ env('SCOUT_PREFIX') }}skills',
      'app-id': '{{ env('ALGOLIA_APP_ID') }}',
      'api-key': '{{ env('ALGOLIA_SECRET') }}'
    }"
  />
@endsection
