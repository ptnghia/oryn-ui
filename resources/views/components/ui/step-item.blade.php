<div class="step-item {{ $vertical ? 'step-item-vertical' : '' }}">
    <div class="step-item-wrapper">
        <span class="{{ $iconClass() }}">
            @if ($customIcon)
                {!! $customIcon !!}
            @elseif ($status === 'complete')
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
            @elseif ($status === 'error')
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
            @else
                {{ $stepNumber }}
            @endif
        </span>
        @if ($title)
            <div class="step-item-content">
                <span class="step-item-title {{ $status === 'error' ? 'step-item-title-error' : '' }}">
                    {{ $title }}
                </span>
                @if ($description)
                    <span class="text-xs text-gray-500">{{ $description }}</span>
                @endif
            </div>
        @endif
    </div>
    @unless ($isLast)
        <div class="{{ $connectClass() }}"></div>
    @endunless
</div>
