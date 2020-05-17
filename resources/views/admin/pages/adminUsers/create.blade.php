@extends('admin.layouts.master', ['breadcrumb' => 'create admin user'])


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
            <form action="{{ route('admin.admin_users.store') }}" method="post" enctype="multipart/form-data"> @csrf

                <div class="form-group row">
                  <label for="name" class="col-md-2">{{ __('Name') }}</label>
                  <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2">{{ __('Email') }}</label>
                    <div class="col-md-10">
                          <input type="text" name="email" id="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-2">{{ __('Password') }}</label>
                    <div class="col-md-10">

                          <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default show-password" type="button">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>

                            <input type="password" name="password" id="password" class="form-control password" placeholder="{{ __('Password') }}" autocomplete="off" rel="gp" data-size="8" data-character-set="a-z,A-Z,0-9,#">

                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-refresh generate-password"></i>
                                </button>
                            </div>
                          </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row">
                    <label for="roles" class="col-md-2">{{ __('Roles') }}</label>
                    <div class="col-md-10">
                            <select name="roles[]" id="roles" required class="form-control select2" multiple="multiple" data-placeholder="{{ __('Roles') }}" style="width: 100%;">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id  }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="name" class="col-md-2">{{ __('Is Active') }}</label>
                    <div class="col-md-10">
                        {!! Form::checkbox('is_active') !!}
                    </div>
                  </div>
                
                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success">{{ __('create') }} <span class="fa fa-plus"></span></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection


