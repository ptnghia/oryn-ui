<li class="timeline-item {{ $isLast ? 'timeline-item-last' : '' }}">
    <div class="timeline-item-wrapper">
        <div class="timeline-item-media">
            <div class="timeline-item-media-content">
                @isset ($media)
                    {{ $media }}
                @else
                    <div class="timeline-item-media-default"></div>
                @endisset
            </div>
            @unless ($isLast)
                <div class="timeline-connect"></div>
            @endunless
        </div>
        <div class="timeline-item-content {{ $isLast ? 'timeline-item-content-last' : '' }}">
            {{ $slot }}
        </div>
    </div>
</li>
