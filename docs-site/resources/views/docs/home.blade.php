<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('oryn-docs-dark') === 'true' }" :class="{ 'dark': darkMode }" x-init="$watch('darkMode', v => localStorage.setItem('oryn-docs-dark', v))">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oryn UI — Laravel Tailwind UI Package</title>
    <meta name="description" content="128+ Blade components, 6 layout systems, 46 page blocks, 5 theme presets. Built with Tailwind CSS 4 and Alpine.js 3 for Laravel 11+.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 antialiased">

{{-- Navbar --}}
<header class="fixed top-0 inset-x-0 z-50 h-14 border-b border-gray-200 dark:border-gray-800 bg-white/90 dark:bg-gray-950/90 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-full">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-lg">
            <span class="text-primary">Oryn</span><span>UI</span>
            <x-oryn-badge variant="primary" size="sm">v1.0</x-oryn-badge>
        </a>
        <nav class="hidden md:flex items-center gap-6 text-sm">
            <a href="{{ route('docs.installation') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors">Docs</a>
            <a href="{{ route('docs.component', 'button') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors">Components</a>
            <a href="https://github.com/ptnghia/oryn-ui" target="_blank" rel="noopener" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors">GitHub</a>
        </nav>
        <button @click="darkMode = !darkMode" class="p-2 rounded-md text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
            <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </button>
    </div>
</header>

{{-- Hero --}}
<section class="pt-28 pb-20 px-4 text-center">
    <div class="max-w-3xl mx-auto">
        <x-oryn-badge variant="primary" class="mb-6">Laravel + Tailwind CSS 4 + Alpine.js 3</x-oryn-badge>
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
            Beautiful UI for<br>
            <span class="text-primary">Laravel</span> apps
        </h1>
        <p class="text-xl text-gray-600 dark:text-gray-400 mb-10 leading-relaxed">
            128+ Blade components, 6 layout systems, 46 pre-built page blocks, and 5 theme presets.
            Built with Tailwind CSS 4 and Alpine.js 3.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <x-oryn-button tag="a" href="{{ route('docs.installation') }}" size="lg" variant="solid">
                Get Started
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </x-oryn-button>
            <x-oryn-button tag="a" href="{{ route('docs.component', 'button') }}" size="lg" variant="plain">
                Browse Components
            </x-oryn-button>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-4xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @foreach([
                ['128+', 'Components'],
                ['6', 'Layout Systems'],
                ['46', 'Page Blocks'],
                ['5', 'Theme Presets'],
            ] as [$number, $label])
            <div>
                <div class="text-4xl font-bold text-primary mb-1">{{ $number }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Feature grid --}}
<section class="py-20 px-4">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Everything you need</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach([
                ['🎨', 'Tailwind CSS 4', 'Built on the latest Tailwind with CSS custom properties for full theming support.'],
                ['⚡', 'Alpine.js 3', 'Interactive components powered by Alpine.js — no build step required for basic usage.'],
                ['🌙', 'Dark Mode', 'First-class dark mode via `.dark` class strategy. Toggle per user preference.'],
                ['🎭', '5 Theme Presets', 'Default, Green, Purple, Orange, and Dark presets. Easy to customize.'],
                ['📦', 'Zero Dependencies', 'No jQuery, no Bootstrap. Just Tailwind CSS and Alpine.js.'],
                ['🔌', 'Laravel First', 'Built as a proper Laravel package with service provider, config publishing, and Blade components.'],
            ] as [$icon, $title, $desc])
            <x-oryn-card class="p-6">
                <div class="text-3xl mb-3">{{ $icon }}</div>
                <h3 class="font-semibold mb-2">{{ $title }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">{{ $desc }}</p>
            </x-oryn-card>
            @endforeach
        </div>
    </div>
</section>

{{-- Component preview section --}}
<section class="py-16 px-4 bg-gray-50 dark:bg-gray-900/30">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-3">Components at a glance</h2>
        <p class="text-center text-gray-500 dark:text-gray-400 mb-12">A quick peek at what's included</p>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- Alerts --}}
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Alerts</h4>
                <div class="space-y-3">
                    <x-oryn-alert variant="success">Operation completed successfully!</x-oryn-alert>
                    <x-oryn-alert variant="warning">Please review before continuing.</x-oryn-alert>
                    <x-oryn-alert variant="error">Something went wrong. Please try again.</x-oryn-alert>
                    <x-oryn-alert variant="info">Your session expires in 5 minutes.</x-oryn-alert>
                </div>
            </div>
            {{-- Buttons --}}
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Buttons</h4>
                <div class="flex flex-wrap gap-3">
                    <x-oryn-button variant="solid">Primary</x-oryn-button>
                    <x-oryn-button variant="twoTone">Two Tone</x-oryn-button>
                    <x-oryn-button variant="outline">Outline</x-oryn-button>
                    <x-oryn-button variant="plain">Plain</x-oryn-button>
                    <x-oryn-button variant="solid" color="success">Success</x-oryn-button>
                    <x-oryn-button variant="solid" color="error">Error</x-oryn-button>
                </div>
            </div>
            {{-- Badges --}}
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Badges & Tags</h4>
                <div class="flex flex-wrap gap-2">
                    <x-oryn-badge variant="primary">Primary</x-oryn-badge>
                    <x-oryn-badge variant="success">Success</x-oryn-badge>
                    <x-oryn-badge variant="warning">Warning</x-oryn-badge>
                    <x-oryn-badge variant="error">Error</x-oryn-badge>
                    <x-oryn-badge variant="info">Info</x-oryn-badge>
                    <x-oryn-tag>Tag</x-oryn-tag>
                    <x-oryn-tag closable>Closable</x-oryn-tag>
                </div>
            </div>
            {{-- Cards --}}
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Card</h4>
                <x-oryn-card>
                    <x-slot:header>Card Header</x-slot:header>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Cards are flexible content containers with optional header and footer slots.</p>
                    <x-slot:footer>
                        <x-oryn-button size="sm" variant="solid">Action</x-oryn-button>
                        <x-oryn-button size="sm" variant="plain">Cancel</x-oryn-button>
                    </x-slot:footer>
                </x-oryn-card>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 px-4 text-center">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-3xl font-bold mb-4">Ready to get started?</h2>
        <p class="text-gray-500 dark:text-gray-400 mb-8">Install Oryn UI in your Laravel project and start building beautiful UIs in minutes.</p>
        <x-oryn-button tag="a" href="{{ route('docs.installation') }}" size="lg" variant="solid">
            View Installation Guide
        </x-oryn-button>
    </div>
</section>

{{-- Footer --}}
<footer class="py-8 border-t border-gray-200 dark:border-gray-800 text-center text-sm text-gray-400">
    <p>Oryn UI — MIT License — Built with ❤️ for the Laravel community</p>
</footer>

</body>
</html>
