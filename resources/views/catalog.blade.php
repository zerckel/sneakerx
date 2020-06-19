@extends('layout.master')

@section('title', @isset($brand) ? $brand->name : 'brands')

@section('id', 'brands')

@section('body')

    @if(isset($brand))
        {{ View::make('components.catalog')->with([
            'products' => $products,
            'brand' => $brand
            ]) }}
    @else
        {{ View::make('components.catalog')->with('brands', $brands) }}
    @endif

@endsection

@section('script', "")
