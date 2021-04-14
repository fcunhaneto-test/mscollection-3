@extends('layouts.app')

@section('title', $header)

@section('navbar')
    @component('components.navbar', ['media' => $media])@endcomponent
@endsection

@section('content')
    <index :header="'{{ $header }}'" :subheader="'{{ $subheader }}'" ></index>
@endsection

@section('footer')
    @component('components.footer')@endcomponent
@endsection
