@extends('layout.master')

@section('title', $news->title)

@section('id', 'NewsSheet')

@section('body')

    {{ View::make('components.newssheet')->with('news', $news) }}

@endsection

@section('script', "newssheet.js")
