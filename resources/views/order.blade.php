@extends('layout.master')

@section('title', 'Cart')

@section('id', 'cart')

@section('body')

    {{ View::make('components.order')->with('basket', $basket) }}

@endsection

@section('script', "basket.js")
