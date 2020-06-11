@extends('layout.master')

@section('title', $product->name)

@section('id', 'productSheet')

@section('body')

    {{ View::make('components.productSheet')->with('product', $product) }}

@endsection

@section('script', "productSheet.js")
