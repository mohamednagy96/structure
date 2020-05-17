@extends('admin.layouts.master',['breadcrumb' => 'settings'])
@section('content')

@component('admin.components.box', ['title'=>'Settings' ])
  

<form action="{{ route('admin.settings.update') }}" method="Post" enctype="multipart/form-data">
@foreach($settings as $key=>$value)
  @if($key == "website_logo")
  <div class="form-row" >
    <label for="validationServer01">{{str_replace('_', ' ', $key)}}</label>  
    <img src="{{ $image ? $image->getUrl() : asset('images/default.jpg') }}" alt="" width="20%" style="margin-left:20%">
    <br>
    <input type="file" name="file" style="padding-top:2em">
  </div>

  <hr>
  @elseif($key == "social_links") 
  <hr>
  <h3>Social links</h3> 
  @foreach(json_decode($value) as $sl)
     <div class="form-row">
      <label for="validationServer01">{{$sl->name}}</label> 
      <input type="text" name="social_links[{{$sl->name}}]" class="form-control is-valid "  value="{{$sl->link}}" id="validationServer01"> 
    </div>
  @endforeach
  @elseif($key == "website_description")
  <div class="form-row">
      <label for="validationServer01">{{str_replace('_', ' ', $key)}}</label>
      <textarea name="data[{{$key,$value}}]" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$value}}</textarea>
  </div>
  @elseif($key == "website_small_description")
  <div class="form-row">
      <label for="validationServer01">{{str_replace('_', ' ', $key)}}</label>
      <textarea name="data[{{$key,$value}}]" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$value}}</textarea>
  </div>
  @else
  <div class="form-row">
      <label for="validationServer01">{{str_replace('_', ' ', $key)}}</label>
      <input type="text" name="data[{{$key,$value}}]" class="form-control is-valid"  value= "{{ $value }}" id="validationServer01">
  </div>
  @endif
  <br>
  @endforeach
@can('settings_edit')
<button type="submit" class="btn btn-primary">Update</button>
@endcan
</form>


@endcomponent
@endsection
