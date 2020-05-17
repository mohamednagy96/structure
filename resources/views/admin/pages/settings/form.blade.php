<div class="form-group">
    <label for="">Logo</label>
    {{ Form::file('website_logo', null , ['class' => 'form-control' ]) }}
</div>
<div class="form-group">
    <label for="">Description</label>
    {{ Form::textarea('website_description', null , ['class' => 'form-control','rows' =>4]) }}
</div>
<hr>
<div class="form-group">
    <label for="">Small Description</label>
    {{ Form::textarea('website_small_description', null , ['class' => 'form-control','rows' =>2]) }}
</div>

<div class="form-group">
    <label for="">Contact Address</label>
    {{ Form::text('contact_address', null , ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label for="">Contact Email</label>
    {{ Form::text('contact_email', null , ['class' => 'form-control']) }}

</div>
<div class="form-group">
    <label for="">Contact Phone</label>
    {{ Form::text('contact_phone', null , ['class' => 'form-control']) }}

</div>
<div class="form-group">
    <label for="">Contact Webiste</label>
    {{ Form::text('contact_webiste', null , ['class' => 'form-control']) }}

</div>
<div class="form-group">
    <label for="">Contact Working Houres</label>
    {{ Form::text('contact_working_houres', null , ['class' => 'form-control']) }}
<hr>
</div><div class="form-group">
    <label for="">Social Links</label>
    {{ Form::text('social_links', null , ['class' => 'form-control','placeholder'=>'-- FaceBook --']) }}
    {{ Form::text('social_links', null , ['class' => 'form-control','placeholder'=>'-- Github --']) }}
    {{ Form::text('social_links', null , ['class' => 'form-control','placeholder'=>'-- Google --']) }}
    {{ Form::text('social_links', null , ['class' => 'form-control','placeholder'=>'-- Twitter --']) }}


</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
</div>

