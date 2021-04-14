@extends('layouts.app')

@section('title', $header)

@section('navbar')
    @component('components.navbar-admin', ['media' => $media])@endcomponent
@endsection

@can('isAdmin')
    @section('content')
        <admin :header="'{{ $header }}'" :subheader="'{{ $subheader }}'"></admin>
    @endsection
@endcan
