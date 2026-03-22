{{-- DataTable: Table + Pagination + Sorting + Selection + Loading --}}
@props([
    'columns' => [],
    'pagingData' => ['total' => 0, 'pageIndex' => 1, 'pageSize' => 10],
    'pageSizes' => [10, 25, 50, 100],
    'selectable' => false,
    'loading' => false,
    'noData' => false,
    'hoverable' => true,
    'noDataText' => 'No data found!',
    'skeletonRows' => 0,
])

<div
    x-data="{
        sorting: { key: '', order: '' },
        selected: [],
        allSelected: false,
        loading: {{ $loading ? 'true' : 'false' }},
        sort(key) {
            if (this.loading) return;
            if (this.sorting.key === key) {
                this.sorting.order = this.sorting.order === 'asc' ? 'desc' : (this.sorting.order === 'desc' ? '' : 'asc');
                if (this.sorting.order === '') this.sorting.key = '';
            } else {
                this.sorting = { key: key, order: 'asc' };
            }
            this.$dispatch('sort-change', { ...this.sorting });
        },
        sortIcon(key) {
            if (this.sorting.key !== key) return 'none';
            return this.sorting.order;
        },
        toggleSelectAll(checked) {
            if (this.loading) return;
            this.allSelected = checked;
            this.selected = checked ? [...this.$refs.tbody.querySelectorAll('[data-row-id]')].map(r => r.dataset.rowId) : [];
            this.$dispatch('select-all-change', { checked, ids: [...this.selected] });
        },
        toggleSelect(id) {
            if (this.loading) return;
            const idx = this.selected.indexOf(id);
            if (idx > -1) { this.selected.splice(idx, 1); } else { this.selected.push(id); }
            const total = this.$refs.tbody ? this.$refs.tbody.querySelectorAll('[data-row-id]').length : 0;
            this.allSelected = this.selected.length > 0 && this.selected.length === total;
            this.$dispatch('select-change', { id, selected: idx === -1, ids: [...this.selected] });
        },
        isSelected(id) { return this.selected.includes(id); },
        isIndeterminate() {
            const total = this.$refs.tbody ? this.$refs.tbody.querySelectorAll('[data-row-id]').length : 0;
            return this.selected.length > 0 && this.selected.length < total;
        },
        resetSelected() { this.selected = []; this.allSelected = false; },
        resetSorting() { this.sorting = { key: '', order: '' }; },
        handlePageChange(e) {
            if (this.loading) return;
            this.resetSelected();
            this.$dispatch('page-change', e.detail);
        },
        handlePageSizeChange(e) {
            if (this.loading) return;
            this.resetSelected();
            this.$dispatch('page-size-change', e.detail);
        }
    }"
    {{ $attributes->merge(['class' => 'data-table-wrapper']) }}
>
    {{-- Loading overlay --}}
    <div class="relative">
        <template x-if="loading">
            <div class="absolute inset-0 bg-white/60 dark:bg-gray-800/60 z-10 flex items-center justify-center rounded-lg">
                <x-oryn-spinner size="32" />
            </div>
        </template>

        <div class="overflow-x-auto">
            <table class="table-default{{ $hoverable ? ' table-hover' : '' }}">
                {{-- Header --}}
                <thead>
                    <tr>
                        @if($selectable)
                            <th class="w-[50px]">
                                <label class="checkbox-label mb-0">
                                    <span class="checkbox-wrapper relative">
                                        <input
                                            type="checkbox"
                                            class="checkbox peer text-primary"
                                            x-bind:checked="allSelected"
                                            x-bind:indeterminate="isIndeterminate()"
                                            @change="toggleSelectAll($event.target.checked)"
                                        />
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-3.5 w-3.5 stroke-neutral fill-neutral opacity-0 transition-opacity peer-checked:opacity-100 pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 mt-[1.25px]"
                                             viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </label>
                            </th>
                        @endif

                        @foreach($columns as $col)
                            <th @if(!empty($col['width'])) style="width: {{ $col['width'] }}px" @endif>
                                @if(!empty($col['sortable']))
                                    <span
                                        class="inline-flex items-center cursor-pointer select-none"
                                        @click="sort('{{ $col['accessorKey'] }}')"
                                    >
                                        {{ $col['header'] }}
                                        <span class="ml-1 inline-flex flex-col">
                                            <svg class="h-3 w-3 -mb-0.5 transition-colors" :class="sortIcon('{{ $col['accessorKey'] }}') === 'asc' ? 'text-primary' : 'text-gray-400'" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
                                            <svg class="h-3 w-3 -mt-0.5 transition-colors" :class="sortIcon('{{ $col['accessorKey'] }}') === 'desc' ? 'text-primary' : 'text-gray-400'" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                        </span>
                                    </span>
                                @else
                                    {{ $col['header'] }}
                                @endif
                            </th>
                        @endforeach
                    </tr>
                </thead>

                {{-- Body --}}
                <tbody x-ref="tbody">
                    @if($loading && $noData && $skeletonRows > 0)
                        {{-- Skeleton loading --}}
                        @for($i = 0; $i < $skeletonRows; $i++)
                            <tr>
                                @if($selectable)
                                    <td><x-oryn-skeleton width="18" height="18" /></td>
                                @endif
                                @foreach($columns as $col)
                                    <td><x-oryn-skeleton height="16" /></td>
                                @endforeach
                            </tr>
                        @endfor
                    @elseif($noData)
                        {{-- No data --}}
                        <tr>
                            <td colspan="{{ count($columns) + ($selectable ? 1 : 0) }}" class="hover:bg-transparent">
                                <div class="flex flex-col items-center gap-4 py-8">
                                    @if(isset($noDataIcon))
                                        {{ $noDataIcon }}
                                    @else
                                        <svg class="w-16 h-16 text-gray-300 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                    @endif
                                    <span class="font-semibold heading-text">{{ $noDataText }}</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        {{ $slot }}
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- Footer: Pagination + Page Size --}}
    @if($total() > 0)
        <div class="flex items-center justify-between mt-4">
            <x-oryn-pagination
                :total="$total()"
                :pageSize="$pageSize()"
                :currentPage="$pageIndex()"
                @page-change.stop="handlePageChange($event)"
            />
            <div style="min-width: 130px;">
                <x-oryn-select
                    size="sm"
                    :searchable="false"
                    :options="$pageSizeOptions()"
                    :value="$pageSize()"
                    @change.stop="handlePageSizeChange($event)"
                />
            </div>
        </div>
    @endif
</div>
