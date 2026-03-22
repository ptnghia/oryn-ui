{{-- AI Chat Block --}}
{{-- Usage: <x-oryn-block-app-ai-chat> ... chat view ... </x-oryn-block-app-ai-chat> --}}
@props([])

<div {{ $attributes->merge(['class' => 'h-full']) }}>
    <div class="flex gap-4 h-full">
        {{-- Main chat view --}}
        <div class="flex-1">
            <x-oryn-card class="h-full">
                {{-- Mobile nav (optional) --}}
                @if(isset($mobileNav))
                    <div class="xl:hidden mb-4">
                        {{ $mobileNav }}
                    </div>
                @endif

                {{-- Chat content or landing view --}}
                {{ $slot }}

                {{-- Chat input --}}
                @if(isset($input))
                    <div class="mt-4">
                        {{ $input }}
                    </div>
                @endif
            </x-oryn-card>
        </div>

        {{-- Side navigation: chat history --}}
        @if(isset($sideNav))
            <div class="hidden xl:block">
                <x-oryn-card class="max-w-[320px] h-full">
                    {{ $sideNav }}
                </x-oryn-card>
            </div>
        @endif
    </div>
</div>
