{{-- Tasks Block --}}
{{-- Usage: <x-oryn-block-app-tasks> ... task list ... </x-oryn-block-app-tasks> --}}
@props([
    'title' => 'Tasks',
])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-6">
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
        @if(isset($headerActions))
            <div class="flex items-center gap-2">
                {{ $headerActions }}
            </div>
        @endif
    </div>

    {{-- Task list --}}
    {{ $slot }}

    {{-- Add task (optional) --}}
    @if(isset($addTask))
        <div class="mt-4">
            {{ $addTask }}
        </div>
    @endif
</div>
