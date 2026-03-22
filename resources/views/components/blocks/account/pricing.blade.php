{{-- Pricing Block --}}
{{-- Usage: <x-oryn-block-account-pricing> ... plan cards ... </x-oryn-block-account-pricing> --}}
@props([
    'title' => 'Pricing',
])

<div {{ $attributes }}>
    {{-- Plans section --}}
    <x-oryn-card class="mb-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-6">
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            @if(isset($cycleToggle))
                {{ $cycleToggle }}
            @endif
        </div>

        {{-- Plans grid --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            {{ $slot }}
        </div>
    </x-oryn-card>

    {{-- FAQ section (optional) --}}
    @if(isset($faq))
        <x-oryn-card>
            {{ $faq }}
        </x-oryn-card>
    @endif

    {{-- Payment dialog (optional) --}}
    @if(isset($paymentDialog))
        {{ $paymentDialog }}
    @endif
</div>
