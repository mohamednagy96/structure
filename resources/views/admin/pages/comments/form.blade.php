
<div class="form-group">
    {{ Form::textarea('comment', null , ['class' => 'form-control','required' => true,'style'=>'resize:none','rows'=>3]) }}
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($comment) ? 'Update' : 'Create' }}</button>
</div>