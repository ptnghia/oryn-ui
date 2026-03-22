{{-- Blank Layout: No header, no sidebar — for auth pages, landing pages --}}
<x-oryn-layout-base type="blank" {{ $attributes->merge(['class' => 'flex flex-auto flex-col h-[100vh]']) }}>
    <div class="flex min-w-0 w-full flex-1">
        {{ $slot }}
    </div>
</x-oryn-layout-base>
