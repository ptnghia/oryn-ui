{{-- Internal Error (500) Block --}}
{{-- Usage: <x-oryn-block-page-internal-error /> --}}
@props([
    'title' => 'Internal Server Error',
    'message' => 'Something went wrong on our end. Please try again later or contact support if the problem persists.',
    'homeUrl' => '/',
    'homeLabel' => 'Back to Home',
])

<div {{ $attributes->merge(['class' => 'flex flex-auto flex-col h-[100vh]']) }}>
    <div class="h-full bg-white dark:bg-gray-800">
        <div class="container mx-auto flex flex-col flex-auto items-center justify-center min-w-0 h-full">
            <div class="min-w-[320px] md:min-w-[500px] max-w-[500px]">
                <div class="text-center">
                    {{-- Illustration --}}
                    @if(isset($illustration))
                        <div class="mb-10 flex justify-center">
                            {{ $illustration }}
                        </div>
                    @else
                        <div class="mb-10 flex justify-center">
                            <div class="text-[120px] font-bold text-gray-200 dark:text-gray-700 leading-none">500</div>
                        </div>
                    @endif

                    <h2 class="text-2xl font-bold">{{ $title }}</h2>
                    <p class="text-lg mt-6 text-gray-500">{{ $message }}</p>

                    @if($homeUrl)
                        <div class="mt-8">
                            <a href="{{ $homeUrl }}" class="inline-flex items-center justify-center bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-700 ring-primary dark:ring-white hover:border-primary dark:hover:border-white hover:ring-1 hover:text-primary dark:hover:text-white dark:hover:bg-transparent text-gray-600 dark:text-gray-100 h-14 rounded-xl px-8 py-2 text-base">
                                {{ $homeLabel }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
