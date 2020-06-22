@extends('layout.masterAdmin')

@section('id', 'admin')

@section('body')

    @if(isset($data))
        {{ View::make('auth.listData')->with('data', $data) }}
    @else
        {{ View::make('auth.login') }}
    @endif

@endsection
