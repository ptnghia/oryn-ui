@php
$tagDefaultColor = 'bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-gray-900 dark:text-gray-50';
@endphp

<div {{ $attributes->merge(['class' => 'tag ' . $tagDefaultColor]) }}>
    @if ($prefix === true)
        <span class="tag-affix tag-prefix {{ $prefixClass }}"></span>
    @elseif (is_string($prefix) && $prefix !== '')
        {!! $prefix !!}
    @endif

    {{ $slot }}

    @if ($suffix === true)
        <span class="tag-affix tag-suffix {{ $suffixClass }}"></span>
    @elseif (is_string($suffix) && $suffix !== '')
        {!! $suffix !!}
    @endif
</div>
