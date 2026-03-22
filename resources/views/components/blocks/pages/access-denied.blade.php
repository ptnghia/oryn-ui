{{-- Access Denied (403) Block --}}
{{-- Usage: <x-oryn-block-page-access-denied /> --}}
@props([
    'title' => 'Access Denied!',
    'message' => 'You have no permission to visit this page',
    'homeUrl' => '/',
    'homeLabel' => 'Back to Home',
])

<div {{ $attributes->merge(['class' => 'container mx-auto h-full']) }}>
    <div class="h-full flex flex-col items-center justify-center">
        {{-- Illustration --}}
        @if(isset($illustration))
            <div class="mb-10">
                {{ $illustration }}
            </div>
        @else
            <div class="mb-10">
                <svg class="w-[280px] h-[280px] text-gray-300 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
            </div>
        @endif

        <div class="text-center">
            <h3 class="mb-2 text-xl font-semibold">{{ $title }}</h3>
            <p class="text-base text-gray-500">{{ $message }}</p>
        </div>

        @if($homeUrl)
            <div class="mt-8">
                <a href="{{ $homeUrl }}" class="inline-flex items-center justify-center bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-700 ring-primary dark:ring-white hover:border-primary dark:hover:border-white hover:ring-1 hover:text-primary dark:hover:text-white dark:hover:bg-transparent text-gray-600 dark:text-gray-100 h-14 rounded-xl px-8 py-2 text-base">
                    {{ $homeLabel }}
                </a>
            </div>
        @endif
    </div>
</div>
