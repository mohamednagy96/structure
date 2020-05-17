@extends('admin.layouts.master',['breadcrumb'=>'cities','breadcrumbModel'=>$country])


@section('content')

@component('admin.components.box', ['title'=>'cities List','create'=>route('admin.cities.create',$country) , 'can'=>'cities_create'])

    <table class="table">

Country : <a href=" {{ route('admin.countries.edit', $country) }} ">{{ $country->name }}</a>
<hr>

    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Option') }}</th>


        </tr>
    </thead>
    <tbody>
        @forelse ($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
                <td>{{ $city->name }}</td>
                <td>{{ $city->created_at ? $city->created_at->diffForhumans() : null }}</td>
                <td>
                    @can('cities_edit')
                            <a href="{{ route('admin.cities.edit',[$country,$city->id]) }}" class="btn btn-primary btn-xs">
                                <span class="fa fa-pencil"></span>
                            </a>
                    @endcan

                    @can('cities_delete')
                            <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.cities.destroy',[$country,$city->id]) }}" >
                                <span class="fa fa-trash"></span>
                            </a>
                    @endcan
                </td>
        </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="alert alert-warning text-center" role="alert">
                        <strong>{{ __('No records found') }}</strong>
                    </div>
                </td>
            </tr>
        @endforelse
                </tbody>
            </table>
    {{-- {{ $cities->links() }} --}}
@endcomponent
@include('admin.partials.delete-modal')
@endsection
