@php
$barHeight = $size === 'sm' ? 'h-1.5' : 'h-2';
$circleWidth = is_numeric($width) ? $width . 'px' : $width;
@endphp

@if ($variant === 'line')
    <div {{ $attributes->merge(['class' => 'progress line']) }}>
        <div class="progress-wrapper">
            <div class="progress-inner {{ $barHeight }}">
                <div
                    class="progress-bg {{ $barColor() }} {{ $barHeight }}"
                    style="width: {{ min(max($percent, 0), 100) }}%;"
                ></div>
            </div>
        </div>
        @if ($showInfo)
            <span class="progress-info heading-text font-bold line ltr:ml-2 rtl:mr-2">
                @if ($customInfo)
                    {!! $customInfo !!}
                @else
                    {{ round($percent) }}%
                @endif
            </span>
        @endif
    </div>
@else
    @php
        $radius = 50 - $strokeWidth / 2;
        $perimeter = 2 * M_PI * $radius;
        $dashOffset = $perimeter * (1 - $percent / 100);
        $gapDeg = $gapDegree ?: 0;

        $beginAngle = match($gapPosition) {
            'bottom' => 90 + $gapDeg / 2,
            'left' => 180 + $gapDeg / 2,
            'right' => -$gapDeg / 2,
            default => -90 + $gapDeg / 2,
        };
    @endphp
    <div {{ $attributes->merge(['class' => 'progress circle']) }} style="width: {{ $circleWidth }}; height: {{ $circleWidth }};">
        <svg viewBox="0 0 100 100" class="w-full h-full">
            <circle
                class="progress-circle-trail"
                cx="50" cy="50" r="{{ $radius }}"
                fill="none"
                stroke-width="{{ $strokeWidth }}"
                stroke-linecap="{{ $strokeLinecap }}"
            />
            <circle
                class="progress-circle-stroke {{ $strokeColor() }}"
                cx="50" cy="50" r="{{ $radius }}"
                fill="none"
                stroke-width="{{ $strokeWidth }}"
                stroke-linecap="{{ $strokeLinecap }}"
                stroke-dasharray="{{ $perimeter }}"
                stroke-dashoffset="{{ $dashOffset }}"
                transform="rotate({{ $beginAngle }} 50 50)"
            />
        </svg>
        @if ($showInfo)
            <span class="progress-circle-info heading-text font-bold">
                @if ($customInfo)
                    {!! $customInfo !!}
                @else
                    {{ round($percent) }}%
                @endif
            </span>
        @endif
    </div>
@endif
