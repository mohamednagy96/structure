@extends('admin.layouts.master')
@section('content')

    @component('admin.components.box',['title'=>'Update Post'])
    {!! Form::Model($post,['route' => ['admin.posts.update', $post->id],'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
    @include('admin.pages.posts.form')
    {!! Form::close() !!}

    @endcomponent
@endsection