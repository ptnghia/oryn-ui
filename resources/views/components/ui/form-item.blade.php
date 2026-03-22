<div {{ $attributes->merge(['class' => 'form-item ' . $layout]) }}>
    @if ($label)
        <label
            class="form-label {{ $labelSizeClass() }} {{ $invalid ? 'invalid' : '' }} {{ $labelClass }}"
            @if ($htmlFor) for="{{ $htmlFor }}" @endif
            @if ($labelStyle()) style="{{ $labelStyle() }}" @endif
        >
            @if ($asterisk)
                <span class="text-error ltr:mr-1 rtl:ml-1">*</span>
            @endif
            {{ $label }}
            @if ($layout !== 'vertical')
                :
            @endif
            @if ($extra)
                <span class="ml-1 font-normal text-gray-500 text-sm">{{ $extra }}</span>
            @endif
        </label>
    @endif

    <div class="w-full">
        {{ $slot }}

        @if ($invalid && $errorMessage)
            <div class="form-explain">
                {{ $errorMessage }}
            </div>
        @endif
    </div>
</div>
