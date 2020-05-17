
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">seo</h3>
</div>
</div>

<div class="form-group">
    <label for="">title</label>
    {{ Form::text('seo[title]', null , ['class' => 'form-control' ]) }}
</div>
<div class="form-group">
    <label for="">description</label>
    {{ Form::textarea('seo[description]', null , ['class' => 'form-control','rows' =>3]) }}
</div>
<div class="form-group">
    <label for="">keyword</label>
    {{ Form::text('seo[keyword]', null , ['class' => 'form-control' ]) }}
</div>
