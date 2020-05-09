@extends('layouts.app')
@section('title', 'Notícias (detalhes)')

@section('content')

    <!-- detalhes -->
    @include('pages.blog.layouts.detail')

    <!-- últimos divulgados -->
    @include('pages.blog.layouts.recent')

@endsection
