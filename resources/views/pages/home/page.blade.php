@extends('layouts.app')
@section('title', 'Home')

@section('content')

    <!-- apresentação -->
    @include('pages.home.layouts.presentation')

    <!-- buscar -->
    @include('pages.house.layouts.search')

    <!-- casas -->
    @include('pages.house.layouts.house-module')
    @include('pages.house.layouts.house-list')

    <!-- notícias -->
    @include('pages.blog.layouts.recent')

@endsection
