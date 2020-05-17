@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('success'))
<div class="alert alert-success hide-5s" role="alert">
    <strong>{{ session()->get('success') }}</strong>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger"  role="alert">
    <strong>{{ session()->get('error') }}</strong>
</div>
@endif

