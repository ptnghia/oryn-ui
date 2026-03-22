@php
$widthStyle = is_numeric($width) ? $width . 'px' : $width;
@endphp

<div
    {{ $attributes->merge(['class' => 'notification']) }}
    style="width: {{ $widthStyle }};"
    @if ($closable)
        x-data="{ show: true }"
        x-show="show"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    @endif
>
    <div class="notification-content {{ !$slot->isNotEmpty() ? 'no-child' : '' }}">
        @if ($type)
            <div class="mr-3 mt-0.5">
                <x-oryn-status-icon :type="$type" />
            </div>
        @endif
        <div class="mr-4">
            @if ($title)
                <div class="notification-title {{ $slot->isNotEmpty() ? 'mb-2' : '' }}">
                    {{ $title }}
                </div>
            @endif
            @if ($slot->isNotEmpty())
                <div class="notification-description {{ !$title ? 'mt-1' : '' }}">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
    @if ($closable)
        <x-oryn-close-button class="notification-close" :absolute="true" @click="show = false" />
    @endif
</div>
