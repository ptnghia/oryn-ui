<div {{ $attributes->merge(['class' => 'tab-list']) }} :class="variant === 'underline' ? 'tab-list-underline' : ''">
    {{ $slot }}
</div>
