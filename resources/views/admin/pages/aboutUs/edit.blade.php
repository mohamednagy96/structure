@extends('admin.layouts.master')


@section('content')

@component('admin.components.box', ['title'=>'Edit '. __($aboutus->title) ])

{!! Form::model($aboutus, ['route' => ['admin.aboutus.update', $aboutus->id], 'method' => 'put','enctype'=>'multipart/form-data']) !!}

@include('admin.pages.aboutUs.form')

{!! Form::close() !!}
@endcomponent

@endsection
