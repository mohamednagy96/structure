@extends('admin.layouts.master')


@section('content')

@component('admin.components.box', ['title' => 'Edit '] )

    {!! Form::model($language, ['route' => ['admin.languages.update', $language->id], 'method' => 'put','enctype'=>'multipart/form-data']) !!}

    @include('admin.pages.languages.form')

    {!! Form::close() !!}
@endcomponent



@endsection
