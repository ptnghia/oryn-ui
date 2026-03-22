@php
$groupClass = collect([
    'avatar-group',
    $chained ? 'avatar-group-chained' : '',
])->filter()->implode(' ');
@endphp

<div {{ $attributes->merge(['class' => $groupClass]) }}>
    {{ $slot }}
    @if ($omittedAvatarContent)
        <x-oryn-avatar class="cursor-pointer">
            {{ $omittedAvatarContent }}
        </x-oryn-avatar>
    @endif
</div>
