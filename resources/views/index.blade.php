@extends('layout.master')

@section('title', 'Home')

@section('id', 'home')

@section('body')

    {{ View::make('components.index')->with(['products'=> $products, 'news' => $news ]) }}

@endsection

@section('script', "home.js")
