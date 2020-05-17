

<div class="form-group">
    <label for="">Title</label>
    {{ Form::text('title', null , ['class' => 'form-control','required','required' => true]) }}
</div>


<div class="form-group">
    <label for="">description</label>
    {{ Form::textarea('description', null , ['class' => 'form-control']) }}
</div>
<div>
    @if(isset($aboutus))
    <td> <img src="{{ $aboutus->image ? $aboutus->image->getUrl() : asset('images/default.jpg') }}" alt="" width="200px"></td>
    <br>
    <br>
    @endif
    {!! Form::file('image', ['enctype'=>'multipart/form-data']) !!}
</div>
</br>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($aboutus) ? 'Update' : 'Create' }}</button>
</div>