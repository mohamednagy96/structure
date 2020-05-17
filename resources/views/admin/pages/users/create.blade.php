@extends('admin.layouts.master', ['breadcrumb' => 'create user'])

@section('content')

    @box(['title' => __('Create user') ])

        @form(['route' => ['admin.users.store']])

            @include('admin.pages.users.form')

        @endform

    @endbox

@endsection
