<x-layouts.docs :nav="$nav" :activePage="$activePage" :title="ucwords(str_replace('-', ' ', $component))">

<x-docs.page-header
    :title="ucwords(str_replace('-', ' ', $component))"
    description="Documentation for this component is coming soon."
    tag="Component"
/>

<x-oryn-alert variant="warning">
    <strong>Coming soon</strong> — This component page is under construction.
    Check back soon or <a href="https://github.com/ptnghia/oryn-ui" class="underline" target="_blank">contribute on GitHub</a>.
</x-oryn-alert>

<div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'alert') }}" class="text-primary hover:underline">← Browse components</a>
</div>

</x-layouts.docs>
