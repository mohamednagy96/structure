

<div class="form-group">
    <label for="">First Name</label>
    {{ Form::text('first_name', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">Middle Name</label>
    {{ Form::text('middle_name', null , ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <label for="">Last Name</label>
    {{ Form::text('last_name', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">Email</label>
    {{ Form::email('email', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">Mobile</label>
    {{ Form::text('mobile', null , ['class' => 'form-control','required' => true]) }}
</div>

<div class="form-group">
    <label for="">Is Active</label>
    {!! Form::checkbox('is_active') !!}</div>
<div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($customer) ? 'Update' : 'Create' }}</button>
</div>