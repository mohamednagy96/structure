<x-locale-input :model="$language ?? null" />

<div class="form-group">
    <label for="">Locale</label>
    {{ Form::text('locale', null , ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    <label for="">Default</label>
    {{-- {{ Form::text('label', null , ['class' => 'form-control', 'required' => true]) }} --}}
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($language) ? 'Update' : 'Create' }}</button>
</div>
