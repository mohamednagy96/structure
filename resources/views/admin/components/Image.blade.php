
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">select image</h3>
</div>
</div>

<div class="box-body">
{!! Form::file('files[]' ,['multiple' => 'multiple','files' => 'true','enctype'=>'multipart/form-data']) !!}
</div>

