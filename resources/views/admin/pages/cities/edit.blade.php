@extends('admin.layouts.master')


@section('content')

@component('admin.components.box', ['title'=>'Edit '. __($city->name) ])

{!! Form::model($city, ['route' => ['admin.cities.update',$country->id, $city->id], 'method' => 'put']) !!}

@include('admin.pages.cities.form')

{!! Form::close() !!}
@endcomponent

@endsection
