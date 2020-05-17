<div class="form-group">
    <label for="">Categories</label>
    @if ($hasParentBtn)
        <button type="button" class="btn btn-info btn-xs" id="parent-category-btn">Parent</button>
    @endif
    <div id="jstree" data-core="{{ $categories }}"></div>
    {!! Form::hidden("{$name}", null , ['id' => 'parent-id-input']) !!}
</div>
