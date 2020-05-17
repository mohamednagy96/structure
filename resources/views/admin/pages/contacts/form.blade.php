
<div class="form-group">
    <label for="">Name</label>
    {{ Form::text('name', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">Email</label>
    {{ Form::text('email', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">Message</label>
    {{ Form::textarea('message', null , ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <label for="">Phone</label>
    {{ Form::text('phone', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">service</label>
    {{-- {{ Form::text('service_id', null , ['class' => 'form-control','required' => true]) }} --}}
    {{ Form::select('service_id',$services,null, ['class' => 'form-control','required' => true,'placeholder'=>'Please select ...'])}}
</div>
<div class="form-group">
    <label for="">Subject</label>
    {{ Form::text('subject', null , ['class' => 'form-control','required' => true]) }}
</div>

</br>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($contact) ? 'Update' : 'Create' }}</button>
</div>
