@props([
    'layout' => 'simple',
    'sideImage' => '/img/others/auth-side-bg.png',
    'splitImage' => '/img/others/auth-split-img.png',
    'splitHeading' => 'The easiest way to build your admin app',
    'splitDescription' => 'Experience seamless project management. Simplify your workflow, and achieve your goals efficiently with our powerful and intuitive tools.',
])

@if($layout === 'simple')
    {{-- Simple: centered card --}}
    <div {{ $attributes->merge(['class' => 'h-full bg-white dark:bg-gray-800']) }}>
        <div class="container mx-auto flex flex-col flex-auto items-center justify-center min-w-0 h-full">
            <div class="min-w-[320px] md:min-w-[400px] max-w-[400px]">
                {{ $slot }}
            </div>
        </div>
    </div>

@elseif($layout === 'side')
    {{-- Side: form left + image right --}}
    <div {{ $attributes->merge(['class' => 'flex h-full p-6 bg-white dark:bg-gray-800']) }}>
        <div class="flex flex-col justify-center items-center flex-1">
            <div class="w-full xl:max-w-[450px] px-8 max-w-[380px]">
                {{ $slot }}
            </div>
        </div>
        <div class="py-6 px-10 lg:flex flex-col flex-1 justify-between hidden rounded-3xl items-end relative max-w-[520px] 2xl:max-w-[720px]">
            <img
                src="{{ $sideImage }}"
                class="absolute h-full w-full top-0 left-0 rounded-3xl object-cover"
                alt="auth-side-bg"
            />
        </div>
    </div>

@elseif($layout === 'split')
    {{-- Split: branded left + form right --}}
    <div {{ $attributes->merge(['class' => 'grid lg:grid-cols-2 h-full p-6 bg-white dark:bg-gray-800']) }}>
        <div class="bg-no-repeat bg-cover py-6 px-16 flex-col justify-center items-center hidden lg:flex bg-primary rounded-3xl">
            <div class="flex flex-col items-center gap-12">
                <img
                    class="max-w-[450px] 2xl:max-w-[900px]"
                    src="{{ $splitImage }}"
                    alt="auth-split-img"
                />
                <div class="text-center max-w-[550px]">
                    <h1 class="text-neutral">{{ $splitHeading }}</h1>
                    <p class="text-neutral opacity-80 mx-auto mt-8 font-semibold">
                        {{ $splitDescription }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center">
            <div class="w-full xl:max-w-[450px] px-8 max-w-[380px]">
                {{ $slot }}
            </div>
        </div>
    </div>
@endif
