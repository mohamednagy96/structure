@extends('admin.layouts.master',['breadcrumb'=>'create city','breadcrumbModel'=>$country])


@section('content')

@component('admin.components.box', ['title'=>'Create new cities'])

{!! Form::open(['route' => ['admin.cities.store',$country->id],'method' => 'POST']) !!}

@include('admin.pages.cities.form')

{!! Form::close() !!}
@endcomponent

@endsection