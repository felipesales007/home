@extends('layouts.app')
@section('title', 'Imóveis')

@section('content')

    <!-- apresentação -->
    @include('pages.house.layouts.presentation')

    <!-- buscar -->
    @include('pages.house.layouts.search.search')

    <!-- casas -->
    @include('pages.house.layouts.house-module')
    @include('pages.house.layouts.house-list')

    <!-- últimos divulgados -->
    @include('pages.house.layouts.related')

@endsection
