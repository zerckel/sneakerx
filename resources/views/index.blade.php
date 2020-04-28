@extends('layout.master')

@section('title', 'Home')

@section('id', 'home')

@section('body')

    {{ View::make('components.index')  }}

@endsection

@section('script', "home.js")
