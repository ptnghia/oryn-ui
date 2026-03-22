{{-- File Manager Block --}}
{{-- Usage: <x-oryn-block-app-file-manager> ... file listing ... </x-oryn-block-app-file-manager> --}}
@props([])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    {{-- Header: breadcrumb + view toggle + upload --}}
    @if(isset($header))
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
            {{ $header }}
        </div>
    @endif

    {{-- File listing: folders + files --}}
    <div class="mt-6">
        {{-- Folders section --}}
        @if(isset($folders))
            <div class="mb-6">
                <h4 class="text-base font-semibold mb-4">Folders</h4>
                {{ $folders }}
            </div>
        @endif

        {{-- Files section --}}
        <div>
            @if(isset($filesTitle))
                <h4 class="text-base font-semibold mb-4">Files</h4>
            @endif
            {{ $slot }}
        </div>
    </div>

    {{-- File details drawer (optional) --}}
    @if(isset($detailDrawer))
        {{ $detailDrawer }}
    @endif

    {{-- Dialogs (optional) --}}
    @if(isset($dialogs))
        {{ $dialogs }}
    @endif
</div>
