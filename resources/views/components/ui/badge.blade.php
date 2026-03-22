@php
$badgeBaseClass = 'rounded-full text-xs font-semibold bg-error text-white';
$dotClass = $isDot()
    ? 'badge-dot w-3 h-3 border border-white dark:border-gray-900'
    : 'badge px-2 py-1 min-w-6';
$badgeClass = $dotClass . ' ' . $badgeBaseClass . ($innerClass ? ' ' . $innerClass : '');
@endphp

@if ($slot->isNotEmpty())
    <span {{ $attributes->merge(['class' => 'badge-wrapper relative flex']) }}>
        <span class="badge-inner {{ $badgeClass }}">
            {{ $displayContent() }}
        </span>
        {{ $slot }}
    </span>
@else
    <span {{ $attributes->merge(['class' => $badgeClass]) }}>
        {{ $displayContent() }}
    </span>
@endif
