@extends('layouts.app')
@section('title', 'Home')

@section('content')

    <!-- apresentação -->
    @include('pages.home.layouts.presentation')

    <!-- buscar -->
    @include('pages.houses.layouts.search.search')

    <!-- casas -->
    @include('pages.houses.layouts.houses-module')
    @include('pages.houses.layouts.houses-list')

    <!-- notícias -->
    @include('pages.home.layouts.blog')

@endsection
