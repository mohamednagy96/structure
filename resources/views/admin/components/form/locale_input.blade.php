@foreach ($langs as $lang)
    <div class="form-group">
        <label for="">{{ $name }} {{ $lang }}</label>
        {{ Form::$type( "{$name}[{$lang}]" , $model ? $model->getTranslation( $name , $lang ) : null , ['class' => 'form-control', 'required' => $required, 'rows' => '3'] ) }}
    </div>
@endforeach
