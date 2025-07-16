<div class="card-title d-flex justify-content-between align-items-center">
    <h4 class="mb-0">{{ $title ?? 'List' }}</h4>
    @if (isset($createRoute))
        <a href="{{ $createRoute }}" class="btn btn-primary btn-sm">
            {{ $createLabel ?? 'Add New' }}
        </a>
    @endif
</div>
