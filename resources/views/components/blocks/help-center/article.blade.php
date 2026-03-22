{{-- Help Center Article Block --}}
{{-- Usage: <x-oryn-block-help-article> ... article body ... </x-oryn-block-help-article> --}}
@props([])

<div {{ $attributes->merge(['class' => 'container mx-auto h-full']) }}>
    <div class="lg:flex justify-center gap-4 h-full">
        {{-- Article body --}}
        <div class="my-6 max-w-[800px] mx-auto flex-1">
            {{-- Article content (prose) --}}
            {{ $slot }}

            {{-- Was this helpful? + Comments --}}
            @if(isset($feedback))
                <div class="mt-8">
                    {{ $feedback }}
                </div>
            @endif
        </div>

        {{-- Table of contents sidebar (sticky) --}}
        @if(isset($tableOfContents))
            <div class="hidden lg:block lg:w-[380px] shrink-0">
                <div class="sticky top-24">
                    {{ $tableOfContents }}
                </div>
            </div>
        @endif
    </div>
</div>
