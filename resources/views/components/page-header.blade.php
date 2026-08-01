<div class="page-header">
    <div class="row align-items-center mw-100">
        <div class="col">
            <div class="mb-1">
                <ol class="breadcrumb" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">
                        <a href="/" wire:navigate>Accueil</a>
                    </li>
                    @foreach ($breadcrumbs ?? [] as $breadcrumb)
                        @if($loop->last)
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ $breadcrumb['url'] }}" wire:navigate>{{ $breadcrumb['label'] }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $breadcrumb['url'] }}" wire:navigate>{{ $breadcrumb['label'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </div>
            <h2 class="page-title">
                <span class="text-truncate">{{ $title ?? 'Page Title' }}</span>
            </h2>
        </div>
        <div class="col-auto">
            {{ $slot }}
        </div>
    </div>
</div>