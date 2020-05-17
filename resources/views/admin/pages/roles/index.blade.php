@extends('admin.layouts.master', ['breadcrumb' => 'roles'])

@section('content')

        @component('admin.components.box',['create' => route('admin.roles.create'), 'can' => 'roles_create'])
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Users') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->users()->count() }}</td>
                            <td>

                                @can('roles_edit')

                                    @if ( !array_key_exists( $role->name ,  config('roles.roles') ) )
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary btn-xs">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                    @endif

                                @endcan

                                @can('roles_delete')

                                    @if ( $role->users()->count() == 0 && !array_key_exists( $role->name ,  config('roles.roles') ) )
                                        <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.roles.destroy', $role->id) }}" >
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    @endif

                                @endcan
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
            </table>
        @endcomponent


    @include('admin.partials.delete-modal')

@endsection
