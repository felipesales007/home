@extends('errors::illustrated-layout')

@section('code', 'Bloqueado')
@section('title', __('Bloqueado'))

@section('image')
    <div style="background-image: url({{ asset('images/error/503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center"></div>
@endsection

@section('message', __('Por favor, entre em contato com o administrador do sistema.'))
