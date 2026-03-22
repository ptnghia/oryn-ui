@props([
    'total' => 0,
    'pageSize' => 10,
    'currentPage' => 1,
    'displayTotal' => false,
])

@php
    $pageCount = $pageSize > 0 ? (int) ceil($total / $pageSize) : 0;
@endphp

<div
    x-data="{
        current: {{ $currentPage }},
        pageCount: {{ $pageCount }},
        goTo(page) {
            if (page >= 1 && page <= this.pageCount) {
                this.current = page;
                this.$dispatch('page-change', { page: page });
            }
        },
        prev() { this.goTo(this.current - 1); },
        next() { this.goTo(this.current + 1); },
    }"
    {{ $attributes->merge(['class' => 'pagination']) }}
>
    @if($displayTotal)
        <span class="pagination-total">Total {{ $total }}</span>
    @endif

    {{-- Previous --}}
    <span
        class="pagination-pager pagination-pager-prev"
        :class="current <= 1 ? 'pagination-pager-disabled' : 'pagination-pager-inactive cursor-pointer'"
        @click="prev()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
    </span>

    {{-- Page numbers --}}
    @for($i = 1; $i <= $pageCount; $i++)
        <span
            class="pagination-pager"
            :class="current === {{ $i }} ? 'text-primary font-bold bg-primary-subtle' : 'pagination-pager-inactive'"
            @click="goTo({{ $i }})"
        >
            {{ $i }}
        </span>
    @endfor

    {{-- Next --}}
    <span
        class="pagination-pager pagination-pager-next"
        :class="current >= pageCount ? 'pagination-pager-disabled' : 'pagination-pager-inactive cursor-pointer'"
        @click="next()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </span>
</div>
