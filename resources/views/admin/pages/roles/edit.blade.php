@extends('admin.layouts.master', ['breadcrumb' => 'update role', 'breadcrumbModel' => $role])


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
            <form action="{{ route('admin.roles.update', $role->id) }}" method="post" > @csrf @method('PUT')

                <div class="form-group row">
                  <label for="name" class="col-md-2">{{ __('Name') }}</label>
                  <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ $role->name }}">
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
                                    <label><input name="permissions[]"
                                        type="checkbox"
                                        class="icheck"
                                        value="{{ $permission->name }}"
                                        data-group-id="{{ $group->id }}"
                                        @if ($role->hasPermissionTo($permission)) checked @endif
                                        > {{ str_replace('-', ' ', $permission->name ) }}</label>
                                </div>
                            @endforeach
                            <hr>
                        </div>
                    @endforeach

                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-md-12">
                            <button type="submit" class="btn btn-success">{{ __('Save') }} <span class="fa fa-save"></span></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection


