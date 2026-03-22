{{-- Help Center Edit Article Block --}}
{{-- Usage: <x-oryn-block-help-edit-article action="/articles/1"> ... editor ... </x-oryn-block-help-edit-article> --}}
@props([
    'action' => '',
    'method' => 'PUT',
])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    <form method="POST" action="{{ $action }}">
        @csrf
        @if(strtoupper($method) !== 'POST')
            @method($method)
        @endif

        {{-- Header --}}
        @if(isset($header))
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-6">
                {{ $header }}
            </div>
        @endif

        {{-- Editor content --}}
        {{ $slot }}

        {{-- Footer --}}
        <div class="sticky bottom-0 left-0 right-0 z-10 mt-8 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 -mx-4 sm:-mx-8 px-8 py-4">
            <div class="container mx-auto">
                <div class="flex items-center justify-end gap-2">
                    @if(isset($footerActions))
                        {{ $footerActions }}
                    @else
                        <x-oryn-button type="submit" variant="solid">Save</x-oryn-button>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
