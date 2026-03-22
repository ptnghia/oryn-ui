<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('oryn-docs-dark') === 'true', sidebarOpen: false }" :class="{ 'dark': darkMode }" x-init="$watch('darkMode', v => localStorage.setItem('oryn-docs-dark', v))">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Oryn UI' }} — Oryn UI Docs</title>
    <meta name="description" content="{{ $description ?? 'Oryn UI — Laravel Tailwind UI Package. 128+ Blade components built with Tailwind CSS 4 and Alpine.js 3.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 antialiased">

    {{-- Top Header --}}
    <header class="fixed top-0 left-0 right-0 z-50 h-14 border-b border-gray-200 dark:border-gray-800 bg-white/90 dark:bg-gray-950/90 backdrop-blur-sm">
        <div class="flex items-center justify-between h-full px-4 lg:px-6">
            {{-- Left: Logo + mobile menu toggle --}}
            <div class="flex items-center gap-3">
                <button
                    class="lg:hidden p-2 rounded-md text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800"
                    @click="sidebarOpen = !sidebarOpen"
                    aria-label="Toggle sidebar"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-lg">
                    <span class="text-primary">Oryn</span><span class="text-gray-800 dark:text-gray-200">UI</span>
                    <x-oryn-badge variant="primary" size="sm">v1.0</x-oryn-badge>
                </a>
            </div>

            {{-- Center: Search hint (Cmd+K) --}}
            <div class="hidden md:flex items-center gap-2 text-sm text-gray-400 border border-gray-200 dark:border-gray-700 rounded-lg px-3 py-1.5 w-56 cursor-pointer hover:border-primary transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                </svg>
                <span>Search docs…</span>
                <kbd class="ml-auto text-xs bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded border border-gray-200 dark:border-gray-700">⌘K</kbd>
            </div>

            {{-- Right: GitHub, Dark mode --}}
            <div class="flex items-center gap-2">
                <a href="https://github.com/ptnghia/oryn-ui" target="_blank" rel="noopener"
                   class="p-2 rounded-md text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                   title="GitHub">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                    </svg>
                </a>
                {{-- Dark mode toggle --}}
                <button @click="darkMode = !darkMode"
                        class="p-2 rounded-md text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                        :title="darkMode ? 'Switch to light mode' : 'Switch to dark mode'">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    {{-- Mobile sidebar overlay --}}
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-out duration-200"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-150"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="lg:hidden fixed inset-0 z-40 bg-black/40 backdrop-blur-sm"
         @click="sidebarOpen = false">
    </div>

    {{-- Layout wrapper --}}
    <div class="flex min-h-screen pt-14">

        {{-- Sidebar --}}
        <aside class="fixed top-14 bottom-0 left-0 z-40 w-72
                      transform transition-transform duration-200 ease-in-out
                      lg:translate-x-0 bg-white dark:bg-gray-950 border-r border-gray-200 dark:border-gray-800
                      overflow-y-auto"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
            <nav class="py-6 px-4">
                @foreach($nav as $group => $items)
                    <div class="mb-6">
                        <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">{{ $group }}</p>
                        <ul class="space-y-0.5">
                            @foreach($items as $item)
                                @php
                                    $isActive = ($activePage ?? null) === ($item['param'] ?? $item['slug'] ?? null);
                                    $href = isset($item['param'])
                                        ? route($item['route'], $item['param'])
                                        : route($item['route']);
                                @endphp
                                <li>
                                    <a href="{{ $href }}"
                                       class="oryn-docs-sidebar-link {{ $isActive ? 'active' : '' }}"
                                       @click="sidebarOpen = false">
                                        {{ $item['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </nav>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 lg:ml-72 min-w-0">
            <div class="max-w-4xl mx-auto px-4 md:px-8 py-10">
                {{ $slot }}
            </div>
        </main>

    </div>

</body>
</html>
