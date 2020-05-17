@extends('admin.layouts.master', ['breadcrumb' => 'create role'])


@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">

            </h3>
            <div class="box-tools">

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ route('admin.roles.store') }}" method="post" > @csrf

                <div class="form-group row">
                  <label for="name" class="col-md-2">{{ __('Name') }}</label>
                  <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" > 
                  </div>
                </div>

                <hr>
                <h3 class="text-center"><strong>{{ __('Permissions') }}</strong></h3>

                <div class="row">
                    @foreach ($permissionGroups as $group)
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label><input type="checkbox" class="checkAll" data-group-id="{{ $group->id }}"> <strong>{{ __($group->name) }}</strong></label>
                            </div>
                            <hr>
                            @foreach ($group->permissions as $permission)
                                <div class="checkbox">
                                    <label><input name="permissions[]" type="checkbox" class="icheck" value="{{ $permission->name }}" data-group-id="{{ $group->id }}"> {{ str_replace('-', ' ', $permission->name ) }}</label>
                                </div>
                            @endforeach
                            <hr>
                        </div>
                    @endforeach
                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-md-12">
                            <button type="submit" class="btn btn-success">{{ __('create') }} <span class="fa fa-plus"></span></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection


