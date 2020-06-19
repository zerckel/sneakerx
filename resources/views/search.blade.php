@extends('layout.master')

@section('title', 'Result For : '. $search )

@section('id', 'results')

@section('body')

    {{ View::make('components.search')->with([
    'search' => $search,
    'results' => $results
    ]) }}

@endsection

@section('script', "productSheet.js")
