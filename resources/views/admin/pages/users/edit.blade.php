@extends('admin.layouts.master', ['breadcrumb' => 'update user', 'breadcrumbModel' => $user])

@section('content')

    @box(['title'=> __('Update user')])

        {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'files' => true, 'method' => 'put']) }}

            @include('admin.pages.users.form', ['update' => true])

        {!! Form::close() !!}


    @endbox

@endsection
