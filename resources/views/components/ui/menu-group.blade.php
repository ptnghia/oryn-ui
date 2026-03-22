@props([
    'label' => '',
])

<div {{ $attributes }}>
    <div class="menu-title menu-title-light dark:menu-title-dark">{{ $label }}</div>
    {{ $slot }}
</div>
