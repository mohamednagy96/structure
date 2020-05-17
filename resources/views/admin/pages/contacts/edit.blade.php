@extends('admin.layouts.master',['breadcrumb'=>'update contact','breadcrumbModel' => $contact])
@section('content')

    @component('admin.components.box',['title'=>'Update Contact'])
    {!! Form::Model($contact,['route' => ['admin.contacts.update', $contact->id],'method' => 'PUT']) !!}
    @include('admin.pages.contacts.form')
    {!! Form::close() !!}

    @endcomponent
@endsection