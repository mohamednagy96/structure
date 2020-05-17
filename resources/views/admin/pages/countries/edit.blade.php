@extends('admin.layouts.master',['breadcrumb'=>'update country','breadcrumbModel' => $country])


@section('content')

@component('admin.components.box', ['title'=>'Edit '. __($country->name) ])

{!! Form::model($country, ['route' => ['admin.countries.update', $country->id], 'method' => 'put']) !!}

@include('admin.pages.countries.form')

{!! Form::close() !!}
@endcomponent

@endsection
