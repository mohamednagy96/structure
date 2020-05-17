@extends('admin.layouts.master')
@section('content')
@component('admin.components.box', ['title'=>'User'])

<table class="table">
        <tr>
            <th scope="col">Name</th>
            <th> {{ $order }} </th>
            {{-- <td>{{ $order->/user->first_name}} {{ $order->user->last_name}}</td> --}}
        </tr>
        <tr>
            <th scope="col">Email</th>
            {{-- <td>{{ $order->user->email }}</td> --}}
        </tr>

        <tr>
            <th scope="col">Mobile</th>
            {{-- <td>{{ $order->user->mobile }}</td> --}}
        </tr>
</table>
@endcomponent
@endsection