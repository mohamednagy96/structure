@extends('admin.layouts.master')


@section('content')

@component('admin.components.box', ['title'=>'Create new Information'])

{!! Form::open(['route' => 'admin.aboutus.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

@include('admin.pages.aboutUs.form')

{!! Form::close() !!}
@endcomponent

@endsection