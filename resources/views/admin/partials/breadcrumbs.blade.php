@if (count($breadcrumbs))

    <section class="content-header">
        <h1>
            {{ __($breadcrumbs[sizeof($breadcrumbs)-1]->title) }}
        </h1>
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li class=""><a href="{{ $breadcrumb->url }}">{{ __($breadcrumb->title) }}</a></li>
                @else
                    <li class="active">

                        {{ __($breadcrumb->title) }}
                    </li>
                @endif

            @endforeach
        </ol>
    </section>

@endif
