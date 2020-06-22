@extends('layout.masterAdmin')

@section('id', 'admin')

@section('body')

    @switch(strstr(url()->current(), '/admin/'))
        @case('/admin/brands/add')
        {{ View::make('auth.option.brands') }}
        @break
        @case('/admin/products/add')
        {{ View::make('auth.option.products') }}
        @break
        @case('/admin/news/add')
        {{ View::make('auth.option.news') }}
        @break
    @endswitch

@endsection

