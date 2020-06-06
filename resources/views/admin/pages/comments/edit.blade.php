@extends('admin.layouts.master')


@section('content')

@component('admin.components.box', ['title'=>'Edit Comment' ])

{!! Form::model($comment, ['route' => ['admin.comments.update',$comment->id], 'method' => 'put']) !!}

@include('admin.pages.comments.form')

{!! Form::close() !!}
@endcomponent

@endsection
