@extends('layouts.app')
@section('title', 'Imóveis')

@section('content')

    <!-- apresentação -->
    @include('pages.houses.layouts.presentation')

    <!-- buscar -->
    @include('pages.houses.layouts.search.search')

    <!-- casas -->
    @include('pages.houses.layouts.houses-module')
    @include('pages.houses.layouts.houses-list')

    <!-- últimos divulgados -->
    @include('pages.houses.layouts.related')

@endsection
