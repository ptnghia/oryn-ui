{{-- Help Center / Support Hub Block --}}
{{-- Usage: <x-oryn-block-help-support-hub> ... categories / articles ... </x-oryn-block-help-support-hub> --}}
@props([
    'title' => 'Assistance & Support Center',
    'subtitle' => 'Have questions? Search for answers or browse our help topics.',
])

<div {{ $attributes }}>
    {{-- Hero section --}}
    <section class="h-[300px] bg-gradient-to-b from-primary/10 to-transparent flex items-center">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-gray-500 mt-2 max-w-[600px] mx-auto">{{ $subtitle }}</p>
            @endif
            @if(isset($search))
                <div class="mt-6 max-w-[800px] mx-auto">
                    {{ $search }}
                </div>
            @endif
        </div>
    </section>

    {{-- Body: categories or article list --}}
    <div class="my-12">
        <div class="container mx-auto">
            <div class="max-w-[1200px] mx-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
