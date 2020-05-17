@extends('admin.layouts.master',['breadcrumb'=>'create contact'])
@section('content')
    @component('admin.components.box',['title'=>'Create Contact'])
    {!! Form::open(['route' => 'admin.contacts.store','method' => 'POST']) !!}
    @include('admin.pages.contacts.form')
    {!! Form::close() !!}
    @endcomponent
@endsection