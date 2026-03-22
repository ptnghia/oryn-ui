{{-- Footer: Page footer with copyright and links --}}
<footer {{ $attributes->merge(['class' => 'footer flex flex-auto items-center h-16 px-4 sm:px-6 md:px-8']) }}>
    @if($pageContainerType === 'contained')
        <div class="container mx-auto">
    @endif

    <div class="flex items-center justify-between flex-auto w-full">
        <span>
            {{ $copyright ?? 'Copyright &copy; ' . date('Y') . '. All rights reserved.' }}
        </span>
        @if(isset($end))
            <div>
                {{ $end }}
            </div>
        @endif
    </div>

    @if($pageContainerType === 'contained')
        </div>
    @endif
</footer>
