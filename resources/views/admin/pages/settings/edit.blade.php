@extends('admin.layouts.master')
@section('content')

@component('admin.components.box', ['title'=>'Edit'])

{!! Form::model($setting, ['route' => ['admin.settings.store']) !!}

@include('admin.pages.settings.form')

{!! Form::close() !!}

@endcomponent

@endsection