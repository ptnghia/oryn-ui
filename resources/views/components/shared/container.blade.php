{{-- Container: Centered max-width content wrapper --}}
<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    {{ $slot }}
</div>
