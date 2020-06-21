@extends('layout.masterAdmin')

@section('id', 'admin')

@section('body')

    @if(isset($data))
        {{ View::make('auth.login') }}
    @else
        {{ View::make('auth.login') }}
    @endif


@endsection

@section('script', "home.js")
