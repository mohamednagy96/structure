@component('admin.components.box', ['title'=>'Images' ])
<div class="row">
    @foreach ($model->images as $image)
        <div class="col-md-3">
            <div class="box" >
                <div class="box-body">
                    <img src="{{ $image->getUrl() }}" class="img-responsive img-thumbnail" style="height: 150px; width:100%">
                </div>
                <div class="box-footer">

                    {{ Form::open( ['route' => ['admin.media.store', $image] , 'style' => 'display:inline-block']) }}
                        <button type="submit" class="btn btn-success {{ $image->isDefault ? 'disabled' : '' }}">Default</button>
                    {{ Form::close() }}

                    {{ Form::open( ['route' => ['admin.media.destroy', $image] , 'method' => 'Delete' , 'style' => 'display:inline-block' ]) }}
                        <button type="submit" class="btn btn-danger {{ $image->isDefault ? 'disabled' : '' }}">Delete</button>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    @endforeach
</div>
@endcomponent
