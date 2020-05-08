@extends('layouts.app')
@section('title', 'Imóvel (detalhes)')

@section('content')

    <!-- detalhes -->
    @include('pages.houses.layouts.detail')

    <!-- últimos divulgados -->
    @include('pages.houses.layouts.related')

@endsection
