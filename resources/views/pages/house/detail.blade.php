@extends('layouts.app')
@section('title', 'Imóvel (detalhes)')

@section('content')

    <!-- detalhes -->
    @include('pages.house.layouts.detail')

    <!-- últimos divulgados -->
    @include('pages.house.layouts.related')

@endsection
