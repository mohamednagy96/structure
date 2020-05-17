@extends('admin.layouts.master')


@section('content')

@component('admin.components.box', ['title'=>'Create new product'])

{!! Form::open(['route' => 'admin.languages.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

@include('admin.pages.languages.form')

{!! Form::close() !!}

@endcomponent

@endsection
