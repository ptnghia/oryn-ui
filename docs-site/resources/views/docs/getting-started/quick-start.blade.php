<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Quick Start">

<x-docs.page-header
    title="Quick Start"
    description="Start using Oryn UI components in your Blade templates."
    tag="Getting Started"
/>

<p class="text-gray-600 dark:text-gray-400 mb-8">
    Once installed, all <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded text-primary">oryn-*</code> components are available globally in any Blade template — no imports required.
</p>

{{-- Your first component --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Your first component</h2>
    <x-docs.code-preview title="Basic Alert">
        <x-slot:rawCode>@verbatim<x-oryn-alert variant="success">
    Welcome to Oryn UI!
</x-oryn-alert>@endverbatim</x-slot:rawCode>
        <x-oryn-alert variant="success">Welcome to Oryn UI!</x-oryn-alert>
    </x-docs.code-preview>
</div>

{{-- Buttons --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Buttons</h2>
    <x-docs.code-preview title="Button variants">
        <x-slot:rawCode>@verbatim<x-oryn-button variant="solid">Save changes</x-oryn-button>
<x-oryn-button variant="outline">Cancel</x-oryn-button>
<x-oryn-button variant="plain" color="error">Delete</x-oryn-button>@endverbatim</x-slot:rawCode>
        <div class="flex flex-wrap gap-3">
            <x-oryn-button variant="solid">Save changes</x-oryn-button>
            <x-oryn-button variant="outline">Cancel</x-oryn-button>
            <x-oryn-button variant="plain" color="error">Delete</x-oryn-button>
        </div>
    </x-docs.code-preview>
</div>

{{-- Card --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Card</h2>
    <x-docs.code-preview title="Card with header and footer">
        <x-slot:rawCode>@verbatim<x-oryn-card>
    <x-slot:header>User Profile</x-slot:header>
    <p>Card body content goes here.</p>
    <x-slot:footer>
        <x-oryn-button size="sm" variant="solid">Save</x-oryn-button>
    </x-slot:footer>
</x-oryn-card>@endverbatim</x-slot:rawCode>
        <x-oryn-card>
            <x-slot:header>User Profile</x-slot:header>
            <p class="text-gray-600 dark:text-gray-400">Card body content goes here.</p>
            <x-slot:footer>
                <x-oryn-button size="sm" variant="solid">Save</x-oryn-button>
            </x-slot:footer>
        </x-oryn-card>
    </x-docs.code-preview>
</div>

{{-- Interactive: Dialog --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Interactive Components</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-4">Interactive components work out of the box with Alpine.js — no configuration needed.</p>
    <x-docs.code-preview title="Dialog">
        <x-slot:rawCode>@verbatim<x-oryn-dialog>
    <x-slot:trigger>
        <x-oryn-button variant="solid">Open Dialog</x-oryn-button>
    </x-slot:trigger>
    <x-slot:title>Confirm Action</x-slot:title>
    Are you sure you want to proceed?
    <x-slot:footer>
        <x-oryn-button size="sm" variant="solid">Confirm</x-oryn-button>
        <x-oryn-button size="sm" variant="plain" @click="$dispatch('dialog-close')">Cancel</x-oryn-button>
    </x-slot:footer>
</x-oryn-dialog>@endverbatim</x-slot:rawCode>
        <x-oryn-dialog>
            <x-slot:trigger>
                <x-oryn-button variant="solid">Open Dialog</x-oryn-button>
            </x-slot:trigger>
            <x-slot:title>Confirm Action</x-slot:title>
            Are you sure you want to proceed? This action cannot be undone.
            <x-slot:footer>
                <x-oryn-button size="sm" variant="solid">Confirm</x-oryn-button>
                <x-oryn-button size="sm" variant="plain" @click="$dispatch('dialog-close')">Cancel</x-oryn-button>
            </x-slot:footer>
        </x-oryn-dialog>
    </x-docs.code-preview>
</div>

{{-- Dark mode --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Dark Mode</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-4">
        Dark mode is enabled by adding the <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">.dark</code> class to your <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">&lt;html&gt;</code> element. Use Alpine.js to toggle it:
    </p>
    <x-docs.code-preview title="Dark mode toggle">
        <x-slot:rawCode>@verbatim<html x-data="{ dark: false }" :class="{ dark: dark }">
    ...
    <button @click="dark = !dark">Toggle dark mode</button>@endverbatim</x-slot:rawCode>
        <x-oryn-button variant="outline" @click="document.documentElement.classList.toggle('dark')">
            Toggle Dark Mode
        </x-oryn-button>
    </x-docs.code-preview>
</div>

{{-- Prev/Next --}}
<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.installation') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Installation
    </a>
    <a href="{{ route('docs.configuration') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Configuration
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</div>

</x-layouts.docs>
