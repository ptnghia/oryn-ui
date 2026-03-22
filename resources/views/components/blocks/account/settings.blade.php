{{-- Account Settings Block --}}
{{-- Usage: <x-oryn-block-account-settings> ... settings content ... </x-oryn-block-account-settings> --}}
@props([])

<x-oryn-card {{ $attributes->merge(['class' => 'h-full']) }}>
    <div class="flex h-full">
        {{-- Sidebar menu (hidden below lg) --}}
        @if(isset($menu))
            <div class="w-[200px] xl:w-[280px] hidden lg:block shrink-0 border-r border-gray-200 dark:border-gray-700 pr-4">
                {{ $menu }}
            </div>
        @endif

        {{-- Main content area --}}
        <div class="xl:pl-6 flex-1 py-2">
            {{-- Mobile menu (visible below lg) --}}
            @if(isset($mobileMenu))
                <div class="lg:hidden mb-6">
                    {{ $mobileMenu }}
                </div>
            @endif

            {{-- Tab content --}}
            {{ $slot }}
        </div>
    </div>
</x-oryn-card>
