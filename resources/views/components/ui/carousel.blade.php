@props([
    'orientation' => 'horizontal',
    'loop' => false,
    'autoPlay' => false,
    'autoPlayInterval' => 3000,
    'showArrow' => true,
    'showIndicators' => true,
])

<div
    x-data="{
        current: 0,
        total: 0,
        loop: {{ $loop ? 'true' : 'false' }},
        autoPlay: {{ $autoPlay ? 'true' : 'false' }},
        interval: {{ $autoPlayInterval }},
        timer: null,
        init() {
            this.total = this.$refs.slides.children.length;
            if (this.autoPlay && this.total > 1) {
                this.startAutoPlay();
            }
        },
        next() {
            if (this.current < this.total - 1) {
                this.current++;
            } else if (this.loop) {
                this.current = 0;
            }
        },
        prev() {
            if (this.current > 0) {
                this.current--;
            } else if (this.loop) {
                this.current = this.total - 1;
            }
        },
        goTo(index) { this.current = index; },
        startAutoPlay() {
            this.timer = setInterval(() => this.next(), this.interval);
        },
        canPrev() { return this.loop || this.current > 0; },
        canNext() { return this.loop || this.current < this.total - 1; },
    }"
    x-init="init()"
    @mouseenter="if(timer) clearInterval(timer)"
    @mouseleave="if(autoPlay) startAutoPlay()"
    {{ $attributes->merge(['class' => 'relative overflow-hidden']) }}
>
    {{-- Slides --}}
    <div x-ref="slides" class="flex transition-transform duration-300 ease-in-out" :style="'transform: translateX(-' + current * 100 + '%)'">
        {{ $slot }}
    </div>

    @if($showArrow)
    {{-- Prev Arrow --}}
    <button
        type="button"
        x-show="canPrev()"
        @click="prev()"
        class="absolute left-2 top-1/2 -translate-y-1/2 z-10 bg-white/80 dark:bg-gray-800/80 rounded-full p-2 shadow hover:bg-white dark:hover:bg-gray-800 transition"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
    </button>

    {{-- Next Arrow --}}
    <button
        type="button"
        x-show="canNext()"
        @click="next()"
        class="absolute right-2 top-1/2 -translate-y-1/2 z-10 bg-white/80 dark:bg-gray-800/80 rounded-full p-2 shadow hover:bg-white dark:hover:bg-gray-800 transition"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </button>
    @endif

    @if($showIndicators)
    {{-- Indicators --}}
    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1.5 z-10">
        <template x-for="(_, i) in total" :key="i">
            <button
                type="button"
                class="h-2 rounded-full transition-all duration-200"
                :class="current === i ? 'w-6 bg-primary' : 'w-2 bg-gray-300 dark:bg-gray-600'"
                @click="goTo(i)"
            ></button>
        </template>
    </div>
    @endif
</div>
