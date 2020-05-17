@extends('admin.layouts.master',['breadcrumb'=>'countries'])


@section('content')

@component('admin.components.box', ['title'=>'Countries List', 'create' => route('admin.countries.create'),'can'=>'countries_create'])

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Language') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Cities') }}</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($countries as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>{{ $country->name }}</td>
                <td> {{ $country->language->name }}  </td>
                <td>{{ $country->created_at ? $country->created_at->diffForhumans() : null }}</td>
                @can('cities_list')
                <td>  <a href="{{ route('admin.cities.index',$country) }}" class="btn btn-primary btn-xs">
                    <span class="fa fa-dot-circle-o"></i>
                        </span>
                </a>
                </td>
                @endcan
                <td>

         @can('countries_edit')
                <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-primary btn-xs">
                    <span class="fa fa-pencil"></span>
                </a>
         @endcan

         @can('countries_delete')
                <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.countries.destroy', $country->id) }}" >
                    <span class="fa fa-trash"></span>
                </a>
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
    {{ $countries->links() }}
@endcomponent
@include('admin.partials.delete-modal')
@endsection
