@extends('layout.master')

@section('title', 'News List')

@section('id', 'newsList')

@section('body')

    {{ View::make('components.catalog')->with('news', $news) }}

@endsection

@section('script', "contact.js")
