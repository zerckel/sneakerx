@extends('layout.master')

@section('title', 'Cart')

@section('id', 'cart')

@section('body')

        {{ View::make('components.basket')->with('basket', $basket) }}

@endsection

@section('script', "basket.js")
