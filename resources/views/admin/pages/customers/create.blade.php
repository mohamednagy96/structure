@extends('admin.layouts.master',['breadcrumb'=>'create customer'])


@section('content')

@component('admin.components.box', ['title'=>'Create new Customer'])

{!! Form::open(['route' => 'admin.customers.store','method' => 'POST']) !!}

@include('admin.pages.customers.form')

{!! Form::close() !!}
@endcomponent

@endsection