@extends('layout.master')

@section('title', 'Contact')

@section('id', 'contact')

@section('body')

    {{ View::make('components.contact') }}

@endsection

@section('script', "contact.js")
