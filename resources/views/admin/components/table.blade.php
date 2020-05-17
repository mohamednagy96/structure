<table class="table table-hover table-bordered table-responsive {{ $class ?? '' }}">
    @if (isset($columns))
        <thead>
            @foreach ($columns as $item)
                <th>{{ $item }}</th>
            @endforeach
        </thead>
    @endif
    {{ $slot }}
</table>

@include('admin.partials.delete-modal')

