{{-- Chat Block --}}
{{-- Usage: <x-oryn-block-app-chat> ... chat body ... </x-oryn-block-app-chat> --}}
@props([])

<x-oryn-card {{ $attributes->merge(['class' => 'h-full']) }}>
    <div class="flex gap-8 h-full">
        {{-- Sidebar: Contact/conversation list --}}
        @if(isset($sidebar))
            <div class="w-full md:w-[300px] shrink-0 border-r border-gray-200 dark:border-gray-700 pr-4">
                {{ $sidebar }}
            </div>
        @endif

        {{-- Chat body --}}
        <div class="w-full flex flex-col">
            {{-- Chat header --}}
            @if(isset($header))
                <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                    {{ $header }}
                </div>
            @endif

            {{-- Messages area --}}
            <div class="flex-1 overflow-y-auto py-4">
                {{ $slot }}
            </div>

            {{-- Input area --}}
            @if(isset($input))
                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $input }}
                </div>
            @endif
        </div>
    </div>

    {{-- Contact info drawer (optional) --}}
    @if(isset($contactDrawer))
        {{ $contactDrawer }}
    @endif
</x-oryn-card>
