@extends('admin.layouts.master', ['breadcrumb' => 'users'])

@section('content')

    @box( ['title' => __('Users')])

        @slot('tools')

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
            {{ __('Create new') }}
            <span class="fa fa-plus"></span>
        </a>

        @endslot

        @component('admin.components.table')
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Registered at') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-xs">
                            <span class="fa fa-pencil"></span>
                        </a>

                        <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.users.destroy', $user->id) }}" >
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="alert alert-warning text-center" role="alert">
                            <strong>{{ __('No records found') }}</strong>
                        </div>
                    </td>
                </tr>
            @endforelse

        </tbody>
        @endcomponent


    @endbox

@endsection
