@extends('admin.layouts.master',['breadcrumb'=>'customers'])


@section('content')

@component('admin.components.box', ['title'=>'customers List', 'create' => route('admin.customers.create'),'can'=>'customers_create'])

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('First Name') }}</th>
            <th>{{ __('Middle Name') }}</th>
            <th>{{ __('Last Name') }}</th>
            <th>{{ __('mobile') }}</th>
            <th>{{ __('email') }}</th>
            <th>{{ __('Is Active') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Option') }}</th>


        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->middle_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->mobile }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->is_active ? "Active" : "Disactive" }}</td>
                <td>{{ $customer->created_at ? $customer->created_at->diffForhumans() : null }}</td>
                <td>
         @can('customers_edit') 
                <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-primary btn-xs">
                    <span class="fa fa-pencil"></span>
                </a>
         @endcan 

         @can('customers_delete')
                <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.customers.destroy', $customer->id) }}" >
                    <span class="fa fa-trash"></span>
                </a>
         @endcan
                </td>
        </tr>
        @empty
            <tr>
                <td colspan="8">
                    <div class="alert alert-warning text-center" role="alert">
                        <strong>{{ __('No records found') }}</strong>
                    </div>
                </td>
            </tr>
        @endforelse
                </tbody>
            </table>
    {{ $customers->links() }}
@endcomponent
@include('admin.partials.delete-modal')
@endsection