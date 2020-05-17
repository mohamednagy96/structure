@extends('admin.layouts.master')
@section('content')
@component('admin.components.box', ['title'=>'About Us', 'create' => route('admin.aboutus.create'),'can'=>'about_create'])

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Images') }}</th>
            <th>{{ __('Created At') }}</th>
        </tr>
    </thead>
    <tbody>
         @forelse ($aboutus as $about)
             <tr>
                 <td>{{ $about->id }}</td>
                 <td>{{ $about->title }}</td>
                 <td> {{ Str::limit($about->description, 30) }}  </td>
                 <td> <img src="{{ $about->image ? $about->image->getUrl() : asset('images/default.jpg') }}" alt="" width="100px"></td>
              <td>{{ $about->created_at->diffForhumans() }}</td>
                 <td>
                    @can('about_edit')
                        <a href="{{ route('admin.aboutus.edit', $about->id) }}" class="btn btn-primary btn-xs">
                            <span class="fa fa-pencil"></span>
                        </a>
                    @endcan
                    @can('about_delete')
                        <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.aboutus.destroy', $about->id) }}" >
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
    @endcomponent
    @include('admin.partials.delete-modal')
@endsection
