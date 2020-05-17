{{ Form::dText(__('Name'), 'name') }}

{{ Form::dEmail(__('Email'), 'email') }}

{{ Form::dPassword(__('Password'), 'password') }}

{{ Form::dSubmit(isset($update)) }}


