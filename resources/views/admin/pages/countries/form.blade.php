

<div class="form-group">
    <label for="">Name</label>
    {{ Form::text('name', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">Languages</label>
    {{ Form::select('language_id',$languages ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- Languages --']) }}
</div>
<div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($country) ? 'Update' : 'Create' }}</button>
</div>