{{-- Project Detail Block --}}
{{-- Usage: <x-oryn-block-app-project-detail title="Project X"> ... tabbed content ... </x-oryn-block-app-project-detail> --}}
@props([
    'title' => '',
])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    {{-- Header --}}
    <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-700 pb-4">
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
        @if(isset($headerActions))
            <div class="flex items-center gap-2">
                {{ $headerActions }}
            </div>
        @endif
    </div>

    {{-- Body: navigation + content --}}
    <div class="mt-6 flex gap-12">
        {{-- Side navigation (hidden below xl) --}}
        @if(isset($navigation))
            <div class="w-[250px] hidden xl:block shrink-0">
                <div class="flex flex-col gap-2">
                    {{ $navigation }}
                </div>
            </div>
        @endif

        {{-- Main content --}}
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
</div>
