@extends('admin.layouts.master')
@section('content')

@component('admin.components.box', ['title'=>'Languages List', 'create' =>
route('admin.languages.create')])

<table class="table">
    <thead>
        <tr>
            <th >ID</th>
            <th >Name</th>
            <th >Locale</th>
            <th>{{ __('Created At') }}</th>
            <th >Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($languages as $language)
        <tr>
            <td>{{ $language->id }}</td>
            <td>{{ $language->name }}
            @if ($language->is_default)
                <span class="label label-primary">Default</span>
            @endif
            </td>
            <td>{{ $language->locale }}</td>
            <td>{{ $language->created_at->diffForhumans() }}</td>
            <td>
                {{-- @can('products_edit') --}}
                <a href="{{ route('admin.languages.edit', $language->id) }}" class="btn btn-primary btn-xs">
                    <span class="fa fa-pencil"></span>
                </a>
                {{-- @endcan --}}

                {{-- @can('products_delete') --}}
                <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn"
                    data-url="{{ route('admin.languages.destroy', $language->id) }}">
                    <span class="fa fa-trash"></span>
                </a>
                {{-- @endcan --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endcomponent

@include('admin.partials.delete-modal')

@endsection
