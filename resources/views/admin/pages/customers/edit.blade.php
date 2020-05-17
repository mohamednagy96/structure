@extends('admin.layouts.master',['breadcrumb'=>'update customer','breadcrumbModel' => $customer])


@section('content')

@component('admin.components.box', ['title'=>'Edit '. __($customer->first_name) ])

{!! Form::model($customer, ['route' => ['admin.customers.update', $customer->id], 'method' => 'put']) !!}

@include('admin.pages.customers.form')

{!! Form::close() !!}
@endcomponent

@endsection
