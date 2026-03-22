@props([
    'value' => '',
    'disabled' => false,
    'icon' => null,
])

<button
    type="button"
    @click="activeTab = '{{ $value }}'"
    :class="{
        'tab-nav-underline': variant === 'underline',
        'tab-nav-pill': variant === 'pill',
        'border-primary text-primary': activeTab === '{{ $value }}' && variant === 'underline',
        'bg-primary text-white': activeTab === '{{ $value }}' && variant === 'pill',
        'tab-nav-disabled': {{ $disabled ? 'true' : 'false' }},
    }"
    {{ $attributes->merge(['class' => 'tab-nav']) }}
    @if($disabled) disabled @endif
>
    @if($icon)
        <span class="tab-nav-icon">{!! $icon !!}</span>
    @endif
    {{ $slot }}
</button>
