@extends('layouts.app')
@section('title', 'Home')

@section('content')

    <!-- apresentação -->
    @include('pages.home.layouts.presentation')

    <!-- buscar -->
    @include('pages.home.layouts.search')

    <!-- casas -->
    @include('pages.home.layouts.houses-module')

@endsection
