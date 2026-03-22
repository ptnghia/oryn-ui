@props([
    'name' => null,
    'checked' => false,
    'disabled' => false,
    'readOnly' => false,
    'isLoading' => false,
    'checkedContent' => null,
    'uncheckedContent' => null,
    'switcherClass' => 'bg-primary dark:bg-primary',
])

<label
    x-data="{ on: {{ $checked ? 'true' : 'false' }} }"
    {{ $attributes->merge(['class' => 'switcher' . ($disabled ? ' switcher-disabled' : '')]) }}
    :class="on ? 'switcher-checked {{ $switcherClass }}' : ''"
>
    <input
        type="checkbox"
        class="hidden"
        x-model="on"
        @if($name) name="{{ $name }}" @endif
        @if($disabled) disabled @endif
        @if($readOnly) readonly @endif
        @change="on = $event.target.checked"
    />
    @if($isLoading)
        <x-oryn-spinner
            :size="16"
            class="switcher-toggle-loading"
            x-bind:class="on ? 'switcher-checked-loading' : 'switcher-uncheck-loading'"
        />
    @else
        <div class="switcher-toggle"></div>
    @endif
    <span class="switcher-content" x-text="on ? '{{ $checkedContent }}' : '{{ $uncheckedContent }}'"></span>
</label>
