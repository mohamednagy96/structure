

    <div class="form-group">
        <label for="">Country</label>
        {{ Form::text('country_id',$country->name , ['class' => 'form-control','disabled' => true]) }}
    </div>

<div class="form-group">
    <label for="">Name</label>
    {{ Form::text('name', null , ['class' => 'form-control','required' => true]) }}
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($city) ? 'Update' : 'Create' }}</button>
</div>