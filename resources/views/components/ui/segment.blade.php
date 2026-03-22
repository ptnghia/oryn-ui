@props([
    'value' => null,
    'size' => 'md',
    'selectionType' => 'single',
])

<div
    x-data="{
        active: '{{ $value ?? '' }}',
        selectionType: '{{ $selectionType }}',
        select(val) {
            if (this.selectionType === 'single') {
                this.active = this.active === val ? '' : val;
            }
        },
        isActive(val) {
            return this.active === val;
        }
    }"
    {{ $attributes->merge(['class' => 'segment gap-2 bg-gray-100 dark:bg-gray-700']) }}
>
    {{ $slot }}
</div>
