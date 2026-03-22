{{-- Generic CRUD Form Layout Block (Create/Edit) --}}
{{-- Usage: <x-oryn-block-crud::crud-form action="/products" sidebarWidth="440px"> ... slots ... </x-oryn-block-crud::crud-form> --}}
@props([
    'action' => '',
    'method' => 'POST',
    'sidebarWidth' => '370px',
    'submitLabel' => 'Save',
    'discardLabel' => 'Discard',
    'discardUrl' => '',
    'submitting' => false,
])

<form method="POST" action="{{ $action }}" {{ $attributes->merge(['class' => 'flex w-full h-full']) }}>
    @csrf
    @if(strtoupper($method) !== 'POST')
        @method($method)
    @endif

    <div class="flex flex-col w-full justify-between">
        <div class="container mx-auto">
            <div class="flex flex-col xl:flex-row gap-4">
                {{-- Main content area --}}
                <div class="gap-4 flex flex-col flex-auto">
                    {{ $slot }}
                </div>

                {{-- Sidebar (optional) --}}
                @if(isset($sidebar))
                    <div class="xl:min-w-[{{ $sidebarWidth }}] 2xl:w-[{{ $sidebarWidth }}] gap-4 flex flex-col">
                        {{ $sidebar }}
                    </div>
                @endif
            </div>
        </div>

        {{-- Bottom sticky bar --}}
        <div class="sticky bottom-0 left-0 right-0 z-10 mt-8 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 -mx-4 sm:-mx-8 px-8 py-4">
            <div class="container mx-auto">
                <div class="flex items-center justify-between">
                    <span></span>
                    <div class="flex items-center gap-2">
                        @if(isset($footerActions))
                            {{ $footerActions }}
                        @else
                            @if($discardUrl)
                                <a href="{{ $discardUrl }}">
                                    <x-oryn-button type="button" variant="outline" customColorClass="text-error border-error ring-error hover:bg-error/5">
                                        {{ $discardLabel }}
                                    </x-oryn-button>
                                </a>
                            @endif
                            <x-oryn-button type="submit" variant="solid">
                                {{ $submitLabel }}
                            </x-oryn-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
