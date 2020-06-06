@extends('admin.layouts.master')
@section('content')
    @component('admin.components.box',['title'=>'Create Post'])
    {!! Form::open(['route' => 'admin.posts.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @include('admin.pages.posts.form')
    {!! Form::close() !!}
    @endcomponent
@endsection