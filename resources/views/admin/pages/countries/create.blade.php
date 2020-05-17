@extends('admin.layouts.master',['breadcrumb'=>'create country'])


@section('content')

@component('admin.components.box', ['title'=>'Create new Country'])

{!! Form::open(['route' => 'admin.countries.store','method' => 'POST']) !!}

@include('admin.pages.countries.form')

{!! Form::close() !!}
@endcomponent

@endsection