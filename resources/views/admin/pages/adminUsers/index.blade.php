@extends('admin.layouts.master', ['breadcrumb' => 'admin users'])

@section('content')

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">

            </h3>
            <div class="box-tools">
                {{-- @can('users-create') --}}
                    <a href="{{ route('admin.admin_users.create') }}" class="btn btn-primary btn-sm">
                        {{ __('Create new') }}
                        <span class="fa fa-plus"></span>
                    </a>
                {{-- @endcan --}}
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Active') }}</th>
                        <th>{{ __('Registered at') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                           <td>{{ $admin->is_active ? "Active" : "Disactive" }}</td>

                            {{-- <td>{{ !$admin->block_at ? 'Active' : 'Not Active' }}</td> --}}
                            <td>{{ $admin->created_at }}</td>
                            <td>
                                {{-- @can('users-update') --}}
                                    <a href="{{ route('admin.admin_users.edit', $admin->id) }}" class="btn btn-primary btn-xs">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                {{-- @endcan --}}

                                {{-- @can('users-delete') --}}
                                    <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.admin_users.destroy', $admin->id) }}" >
                                        <span class="fa fa-trash"></span>
                                    </a>
                                {{-- @endcan --}}
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
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    @include('admin.partials.delete-modal')
@endsection
