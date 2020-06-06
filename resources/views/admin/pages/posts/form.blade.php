
<div class="form-group">
    <label for="">Title</label>
    {{ Form::text('title', null , ['class' => 'form-control','required' => true]) }}
</div>

<div class="form-group">
    <label for="">Body</label>
    {{ Form::textarea('body', null , ['class' => 'form-control','required' => true,'style'=>'resize:none']) }}
</div>

@if(isset($post) && $post->photo != null)
{{-- <div class="col-md-3 p-0 " style="background:white;border-bottom-left-radius:5px;border-color:#E6FFFD;height:210px"> --}}
<div class="form-group col-md-3">

    <img  id="preview" src="{{ asset('images/posts/'.$post->photo) }}" style="width:100%;height:100%;border-color:E6FFFD" alt="...">
</div>

    {{-- </div> --}}
@endif
<div class="form-group col-md-9" style="height:210px">
    <label for="">Photo</label>
    {{ Form::file('photo', null , ['class' => 'form-control','enctype'=>'multipart/form-data']) }}
</div>

<div class="form-group col-md-12">
    <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update' : 'Create' }}</button>
</div>
