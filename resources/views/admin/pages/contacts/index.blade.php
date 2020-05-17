@extends('admin.layouts.master',['breadcrumb'=>'contacts'])
@section('content')

    
@component('admin.components.box',['title'=>'Contact List','create'=>route('admin.contacts.create'),'can'=>'contacts_create'])
  <table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Subject</td>
            <td>Message</td>
            <td>Phone</td>
            <td>Services</td>
            <td>Created at</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ Str::limit($contact->message,30) }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->service->name }}</td>
            <td>{{ $contact->created_at->diffForHumans() }}</td>

            <td>
                @can('contacts_edit') 
                <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-primary btn-xs">
                    <span class="fa fa-pencil"></span>
                </a>
                @endcan 
                @can('contacts_delete')
                        <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.contacts.destroy', $contact->id) }}" >
                            <span class="fa fa-trash"></span>
                        </a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endcomponent

@include('admin.partials.delete-modal')
@endsection