@extends('layout.master')

@section('title', 'Confirmation Order')

@section('id', 'order')

@section('body')

    {{ View::make('components.confirmation')->with('order', $order) }}

@endsection

@section('script', "home.js")
